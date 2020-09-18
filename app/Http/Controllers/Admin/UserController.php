<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
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
        $request->validate([
            'user_name' => 'required|string|max:191|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'age' => 'required|int',
            'role_id' => 'required|int',
            'image' => 'nullable|image',
        ]);

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

        $request->session()->flash('user_created', true);
        return redirect()->route('admin.users.edit', $users->id);
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

        $request->validate([
            'user_name' => 'required|string|max:191',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'age' => 'required|int',
            'role_id' => 'required|int',
            'image' => 'nullable|image',
        ]);

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

        $request->session()->flash('user_edited', true);
        return redirect()->route('admin.users.edit', $users->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Comment::where('made_by', $id)->delete();
        User::destroy($id);

        $request->session()->flash('user_destroyed', true);
        return redirect()->route('admin.users.edit', $id);
    }

    public function restore(Request $request, $id)
    {
        User::withTrashed()->where('id',$id)->restore();
        Comment::withTrashed()->where('made_by', $id)->restore();

        $request->session()->flash('user_restored', true);
        return redirect()->route('admin.users.edit', $id);
    }
}
