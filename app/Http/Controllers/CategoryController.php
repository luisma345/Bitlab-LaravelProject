<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $query=Category::query();
            
        if (!Auth::guest()) {
            $categories = $query->with(
                [
                    'news' => function ($query){
                        $query->withCount('comments','readingHistories')
                        ->with(
                            [
                                'readingHistory' => function ($query){
                                    $query->where('users_id', auth()->id());
                                }
                            ]
                        )
                        ->orderby('publication_date', 'DESC');  
                    }   
                ]
            );
        }
        else{
            $categories = $query->with(
                [
                    'news' => function ($query){
                        $query->withCount('comments','readingHistories')
                        ->orderby('publication_date', 'DESC');
                    }
                ]
            );
        }
        
        // $categories = $query->orderBy('publication_date', 'DESC')        
        //     ->paginate(24);

        // $categories->appends($_GET);


        $category = $query->findOrFail($id);

        // dd($category);
            
        return view('categories.show', compact('category'), ['menu'=>'category']);
    }
}
