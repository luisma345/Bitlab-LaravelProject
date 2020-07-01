<?php

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


Route::get('name', function () {
    return 'Plataforma Digital de Noticas y Reseñas de Tecnología';
});

Route::get('creador', function () {
    return 'Luis Manuel Bonilla Anaya';
});

Route::get('porque', function () {
    return 'Además que pondré en practica mis conocimientos durante el curso, 
            me gusta bastante la idea de crear esta plataforma que trate acerca 
            de la tecnología, un mundo con muchas personas geek interesadas y posibles usuarios de esta';
});

Route::get('objetivo', function () {
    return 'Crear un plataforma funciona de diferentes tipos de artículos relacionado al mundo de la tecnología.';
});

Route::get('usuariofinal', function () {
    return 'Personas que están interesadas en conocer las noticias más recientes del mundo tecnológico';
});