<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('id', 'name', 'description', 'image')->get();
        return view('categories.index', ['menu'=>'category'], compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::findOrFail($id);
        
        $query=News::query();
        if (!Auth::guest()) {
            $news = $query->with(['readingHistory' => function ($query){
                $query->where('users_id', auth()->id());
            }]);
        }
        $news = $query->where('category_id', $category->id );
        $news = $query->withCount('comments','readingHistories')
            ->orderBy('publication_date', 'DESC')        
            ->paginate(24);

            
        return view('categories.show', compact(['category','news']), ['menu'=>'category']);
    }
}
