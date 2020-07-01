<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function showNews(){
        return "Página de recopilación de noticias";
    }
    public function showComments(int $id){
        return "Comentario con id: $id";
    }
    public function newsName(string $name){
        return "Noticia con nombre: $name";
    }
    public function newsWriter(string $name){
        return "Nombre de escritor de noticia: $name";
    }
    public function newsRate(int $rate){
        return "Puntuación de la noticia: $rate de 5";
    }
}
