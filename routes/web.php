<?php

// use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UserController;
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
// Route::resource('login', 'LoginController');


Route::prefix('admin')->name('admin.')->group(
    function () {
        //Categories
        Route::prefix('categories')->name('categories.')->group(
            function(){
                Route::get('', [CategoryController::class, 'index'])->name('index');
                Route::get('create', [CategoryController::class, 'create'])->name('create');
                Route::post('store', [CategoryController::class, 'store'])->name('store');
        
                Route::prefix('{category}')->group(
                    function () {
                        Route::get('', [CategoryController::class, 'show'])->name('show');
                        Route::get('edit', [CategoryController::class, 'edit'])->name('edit');
                        Route::put('', [CategoryController::class, 'update'])->name('update');
                        Route::delete('', [CategoryController::class, 'destroy'])->name('destroy');
                    }
                );
            }
        );
        // News
        Route::prefix('news')->name('news.')->group(
            function(){
                Route::get('', [NewsController::class, 'index'])->name('index');
                Route::get('create', [NewsController::class, 'create'])->name('create');
                Route::post('store', [NewsController::class, 'store'])->name('store');
                Route::post('addComent', [NewsController::class, 'addComent'])->name('addComent');
        
                Route::prefix('{category}')->group(
                    function () {
                        Route::get('', [NewsController::class, 'show'])->name('show');
                        Route::get('edit', [NewsController::class, 'edit'])->name('edit');
                        Route::put('', [NewsController::class, 'update'])->name('update');
                        Route::delete('', [NewsController::class, 'destroy'])->name('destroy');
                    }
                );
            }
        );

        // User
        Route::prefix('users')->name('users.')->group(
            function(){
                Route::get('', [UserController::class, 'index'])->name('index');
                Route::get('create', [UserController::class, 'create'])->name('create');
                Route::post('store', [UserController::class, 'store'])->name('store');
        
                Route::prefix('{users}')->group(
                    function () {
                        Route::get('', [UserController::class, 'show'])->name('show');
                        Route::get('edit', [UserController::class, 'edit'])->name('edit');
                        Route::put('', [UserController::class, 'update'])->name('update');
                        Route::delete('', [UserController::class, 'destroy'])->name('destroy');
                    }
                );
            }
        );
    }
);





