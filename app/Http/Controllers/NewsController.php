<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

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
        return view('news.show', compact('news'), ['menu'=>'']);
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

        $comment->made_by = auth()->user()->id;
        $comment->news_id = $request->news_id;

        $comment->save();

        return redirect()->route('news.show', $comment->news_id);
    }
}
