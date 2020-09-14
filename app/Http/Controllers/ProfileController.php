<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\models\readingHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users= User::findOrFail(auth()->id());
        return view('profile.show', compact('users'), ['option'=>'profile']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editFirstTime($user_name)
    {
        $users = User::findOrFail('user_name', auth()->user()->user_name);
        dd($users);
        return view('profile.editFirstTime', compact('users'));
    }
    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        
        $users = User::where('user_name', auth()->user()->user_name)->firstOrFail();
        
        return view('profile.edit', compact(['users']), ['option'=>'profile']);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $users = User::findOrFail(auth()->id());

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

        $users->save();


        return redirect()->route('profile.show', $users->id);
    }

    public function readingHistory(){
        User::findOrFail(auth()->id());

        $readed = readingHistory::with([
                    'news' => function ($query){
                        $query->withCount('comments','readingHistories');
                    }])
                ->where('users_id',auth()->user()->id)
                ->get();
                

        return view('profile.readedHistory',['option'=>'user_history'], compact('readed'));
    }
}
