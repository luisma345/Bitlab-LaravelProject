<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use App\models\readingHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::withCount('comments','readingHistories')
        ->findOrFail($id);

        // readingHistory
        if (!Auth::guest()) {
            $readingHistory = readingHistory::updateOrCreate(
                ['users_id' => auth()->user()->id, 'news_id' => $news->id],
                ['readed_at' => now()]
            );
            return view('news.show', compact(['news', 'readingHistory']), ['menu'=>'']);    

        }

        return view('news.show', compact('news'), ['menu'=>'']);
    }

    public function likeNews($id){
        $news=News::findOrFail($id);
        $readingHistory=readingHistory::where(
                ['users_id' => auth()->user()->id, 'news_id' => $news->id])
                ->firstOrFail();
        $readingHistory->liked=true;
        $readingHistory->save();

        return redirect()->route('news.show', $news->id);
    }
    public function unlikeNews($id){
        $news=News::findOrFail($id);
        $readingHistory=readingHistory::where(
                ['users_id' => auth()->user()->id, 'news_id' => $news->id])
                ->firstOrFail();
        $readingHistory->liked=false;
        $readingHistory->save();
        return redirect()->route('news.show', $news->id);
    }

    public function addComent(Request $request)
    {    
        News::findOrFail($request->news_id);
        
        $request->validate([
                'content' => 'required|string',
        ]);

        

        $comment = new Comment($request->only([
            'content',
        ]));
        $comment->date=now();

        $comment->made_by = auth()->user()->id;
        $comment->news_id = $request->news_id;

        $comment->save();

        return redirect()->route('news.show', $comment->news_id);
    }
}
