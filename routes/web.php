<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectInfoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('project')->name('project.')->group(
    function(){
        Route::get('name', [ProjectInfoController::class, 'name'])->name('name');
        
        Route::get('creator', [ProjectInfoController::class, 'creator'])->name('creator');
        
        Route::get('why', [ProjectInfoController::class, 'why'])->name('why?');
        
        Route::get('objective', [ProjectInfoController::class, 'objective'])->name('objective');
        
        Route::get('finalUser', [ProjectInfoController::class, 'finalUser'])->name('finalUser');
});

Route::prefix('news')->name('news.')->group(
    function(){
        Route::get('', [NewsController::class, 'showNews'])->name('show');
        Route::get('comment/{id}', [NewsController::class, 'showComments'])->where('id', '[0-9]+')
                ->name('commentsByID');
        Route::get('{name}', [NewsController::class, 'newsName'])->where('name', '[A-Za-z]+')
                ->name('newsName');
        Route::get('writer/{name}', [NewsController::class, 'newsWriter'])
                ->where('name', '[A-Za-z]+')
                ->name('newsWriter');
        Route::post('rate/{rate}', [NewsController::class, 'newsRate'])
                ->name('newsRate');
});
