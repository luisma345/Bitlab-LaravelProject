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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::select('id', 'user_name', 'email', 'image')->get();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.show', compact('users'), ['option'=>'user']);

        // $users = User::where('id',1)->findOrFail($id);
        // return view('admin.users.profile', compact('users'), ['option'=>'profile']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
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


        return redirect()->route('admin.users.show', $users->id);
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

        return redirect()->route('admin.users.index');
    }
}
