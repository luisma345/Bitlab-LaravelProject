<?php

use App\Http\Controllers\Writer\NewsController;
use Illuminate\Support\Facades\Route;

Route::prefix('writer')->middleware('writer')->name('writer.')->group(
    function () {

        // News
        Route::prefix('news')->name('news.')->group(
            function(){
                Route::get('', [NewsController::class, 'index'])->name('index');
                Route::get('create', [NewsController::class, 'create'])->name('create');
                Route::post('store', [NewsController::class, 'store'])->name('store');
                Route::post('addComent', [NewsController::class, 'addComent'])->name('addComent');
        
                Route::prefix('{news}')->group(
                    function () {
                        Route::get('', [NewsController::class, 'show'])->name('show');
                        Route::get('edit', [NewsController::class, 'edit'])->name('edit');
                        Route::put('', [NewsController::class, 'update'])->name('update');
                        Route::delete('', [NewsController::class, 'destroy'])->name('destroy');
                    }
                );
            }
        );
    }
);