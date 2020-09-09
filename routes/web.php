<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectInfoController;
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
            }
        );
    }
);

require base_path('routes/web-admin.php');

