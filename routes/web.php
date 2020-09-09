<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Página Principal
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('home', [HomeController::class, 'index'])->name('home');

// About us
Route::get('about-us', [HomeController::class, 'about'])->name('about-us');



// News
Route::prefix('news')->name('news.')->group(
    function(){
        Route::post('addComent', [NewsController::class, 'addComent'])->name('addComent');

        Route::prefix('{news}')->group(
            function () {
                Route::get('', [NewsController::class, 'show'])->name('show');
            }
        );
    }
);

Route::prefix('profile')->name('profile.')->group(
    function () {
        //Profile
        Route::get('{user}', [ProfileController::class, 'show'])->name('show');

        Route::prefix('{user}')->group(
            function () {
                Route::get('editFirstTime', [ProfileController::class, 'editFirstTime'])->name('editFirstTime');
                Route::get('edit', [ProfileController::class, 'edit'])->name('edit');
                Route::put('', [ProfileController::class, 'update'])->name('update');
            }
        );
    }
);

//Categories
Route::prefix('categories')->name('categories.')->group(
    function(){
        Route::get('', [CategoryController::class, 'index'])->name('index');

        Route::prefix('{category}')->group(
            function () {
                Route::get('', [CategoryController::class, 'show'])->name('show');
            }
        );
    }
);

require base_path('routes/web-admin.php');

