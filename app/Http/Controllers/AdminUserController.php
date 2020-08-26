<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\Role;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminUsers=AdminUser::select('id', 'user_name', 'email')->get();
        return view('admin_users.index',['option'=>'admins'], compact('adminUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin_users.create',['option'=>'admins'],compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::findOrFail($request->roles_id);

        $adminUsers = new AdminUser($request->only([
            'user_name',
            'password',
            'email',
            'first_name',
            'last_name',
        ]));

        $adminUsers->roles_id = $request->roles_id;
        $adminUsers->save();

        return redirect()->route('adminUser.show', $adminUsers->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adminUsers = AdminUser::findOrFail($id);
        return view('admin_users.show', compact('adminUsers'), ['option'=>'admins']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminUsers = AdminUser::findOrFail($id);
        $roles = Role::get();
        return view('admin_users.edit', compact(['adminUsers', 'roles']), ['option'=>'admins']); 
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
        $adminUsers = AdminUser::findOrFail($id);

        $adminUsers->update($request->all());

        return redirect()->route('adminUser.show', $adminUsers->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminUser::destroy($id);
        return redirect()->route('adminUser.index');
    }
}
