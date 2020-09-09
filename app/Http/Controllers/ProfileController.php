<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users= User::findOrFail($id);
        return view('profile.show', compact('users'), ['menu'=>'profile']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editFirstTime($user_name)
    {
        $users = User::findOrFail('user_name', $user_name);
        // $users= User::findOrFail($id);
        dd($users);
        return view('profile.editFirstTime', compact('users'));
    }
}
