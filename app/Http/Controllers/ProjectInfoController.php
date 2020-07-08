<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectInfoController extends Controller
{
    public function name(){
        return "Plataforma Digital de Noticas y Reseñas de Tecnología";
    }
    public function creator(){
        return "Creador: Luis Manuel Bonilla Anaya";
    }
    public function finalUser(){
        return "Personas que están interesadas en conocer las noticias más recientes del mundo tecnológico";
    }
    public function objective(){
        return "Crear un plataforma funciona de diferentes tipos de artículos relacionado al mundo de la tecnología.";
    }
    public function why(){
        return "Además que pondré en practica mis conocimientos durante el curso, 
        me gusta bastante la idea de crear esta plataforma que trate acerca 
        de la tecnología, un mundo con muchas personas geek interesadas y posibles usuarios de esta";
    }
}
