<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\models\readingHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * Show the all the news.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $news=News::withCount('comments','readingHistories')
        //         ->orderBy('publication_date', 'DESC')        
        //         ->paginate(24);
        $query=News::query();
        if(!is_null($request->keyword)){
            $query->where(
                function($query) use ($request){
                    $query->where('title','like',"%$request->keyword%");
                }
            );
            $news = $query->withCount('comments','readingHistories')
            ->orderBy('publication_date', 'DESC')        
            ->paginate(24);
            $news->appends($_GET);

        return view('home',['menu'=>'main'], compact('news'));

        }

        $news=News::withCount('comments','readingHistories')
        ->orderBy('publication_date', 'DESC')        
        ->paginate(24);

        // // readingHistory
        // if (!Auth::guest()) {
        //     $readingHistory = readingHistory::where(
        //         'users_id', auth()->user()->id
        //     )->get();
        //     dd($readingHistory);
        // return view('home',['menu'=>'main'], compact(['news', 'readingHistory']));

        // }

        return view('home',['menu'=>'main'], compact('news'));
    }

    /**
     * Return the about page
     *
     * @return void
     */
    public function about()
    {

        return view('about.about-us',['menu'=>'about']);
    }
}
