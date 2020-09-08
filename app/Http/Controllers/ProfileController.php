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

        // $users = User::where('id',1)->findOrFail($id);
        // return view('admin.users.profile', compact('users'), ['option'=>'profile']);
    }
}
