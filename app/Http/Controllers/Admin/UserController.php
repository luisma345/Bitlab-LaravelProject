<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query=User::query();
        if(!is_null($request->keyword)){
            $query->where(
                function($query) use ($request){
                    $query->where('user_name','like',"%$request->keyword%")
                            ->orWhere('email','like',"%$request->keyword%")
                            ->orWhere('first_name','like',"%$request->keyword%")
                            ->orWhere('last_name','like',"%$request->keyword%");
                }
            );
            
        }
        // $users = $query
        $users = $query->with('role')->withTrashed()->paginate(15);

        $users->appends($_GET);

        return view('admin.users.index',['option'=>'user'], compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.users.create',['option'=>'user'],compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User($request->only([
            'email',
            'first_name',
            'last_name',
            'age',
        ]));
        $users->user_name=strtolower($request->user_name);
        $users->password=bcrypt($request->password);

        if ($request->hasFile('image')) {
            $users->image=basename(Storage::put('users-profilePicture', $request->image));
        }
        
        $users->role_id = $request->role_id;
        $users->save();

        return redirect()->route('admin.users.show', $users->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::withTrashed()->where('id','!=', auth()->id())->findOrFail($id);
        $roles = Role::get();
        return view('admin.users.edit', compact(['users','roles']), ['option'=>'user']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Role::findOrFail($request->role_id);

        $users = User::findOrFail($id);

        $users->fill($request->only([
            'email',
            'first_name',
            'last_name',
            'age',
        ]));
        $users->user_name=strtolower($request->user_name);
        if (!is_null($request->password)) {
            $users->password=bcrypt($request->password);
        }

        if ($request->hasFile('image')) {
            $users->image=basename(Storage::put('users-profilePicture', $request->image));
        }

        $users->role_id = $request->role_id;
        $users->save();


        return redirect()->route('admin.users.edit', $users->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('admin.users.edit', $id);
    }

    public function restore($id)
    {
        User::withTrashed()->where('id',$id)->restore();

        return redirect()->route('admin.users.edit', $id);
    }
}
