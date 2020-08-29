<?php

use App\Http\Controllers\LoginController;
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

Route::get('dashboard', function () {
        return view('dashboard.dashboard',['option'=>'dashboard']);
    })->name('dashboard');

// Route::get('login', function () {
//         return view('login.login');
//     });
Route::resource('login', 'LoginController');

Route::resource('categories', 'CategoryController');

Route::resource('news', 'NewsController');


Route::resource('users', 'UserController');
