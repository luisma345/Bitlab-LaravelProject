<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news=News::withCount('comments','readingHistories')        
                ->get();

        return view('home',['menu'=>'main'], compact('news'));
    }
}
