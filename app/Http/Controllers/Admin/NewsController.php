<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
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
    public function index()
    {
        $news=News::withCount('comments','readingHistories')        
            ->orderBy('publication_date', 'DESC')
            ->get();
        return view('admin.news.index',['option'=>'news'], compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.news.create',['option'=>'news'], compact('categories'));
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
            'title' => 'required|string|max:191',
            'description' => 'required|string',
            'article' => 'required|string',
            'publication_date'=>'required|date',
            'category_id'=>'required|integer',
        ]);



        Category::findOrFail($request->category_id);

        $news = new News($request->only([
            'title',
            'description',
            'article',
            'publication_date',
        ]));

        $news->writer = auth()->user()->id; 
        $news->category_id = $request->category_id;
        $news->image=basename(Storage::put('news-images', $request->image));

        $news->save();

        return redirect()->route('admin.news.show', $news->id);
    }

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
        return view('admin.news.show', compact('news'), ['option'=>'news']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::get();
        return view('admin.news.edit', compact(['news', 'categories']), ['option'=>'news']); 
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
        $news = News::findOrFail($id);

        $news->fill($request->all());
        $news->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $news->image=basename(Storage::put('news-images', $request->image));
        }
        $news->save();

        return redirect()->route('admin.news.show', $news->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        return redirect()->route('admin.news.index');
    }

    public function addComent(Request $request)
    {
        
            
        News::findOrFail($request->news_id);
        
        // $request->validate([
        //         'content' => 'required|string',
        // ]);

        

        $comment = new Comment($request->only([
            'content',
        ]));
        $comment->date = now();
        $comment->made_by = auth()->user()->id;
        $comment->news_id = $request->news_id;

        $comment->save();

        return redirect()->route('admin.news.show', $comment->news_id);
    }

}
