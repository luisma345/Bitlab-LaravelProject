@extends('layouts.main')

@section('title','Inicio')

@section('content')
<div class="flex justify-center w-full pt-16">
    <div class="block mx-2">
        <div class="flex justify-center my-4">
            <img src="{{ asset('img/logo/TechNewsLogo.png') }}" alt="Tech News Logo" class="w-full md:w-1/5">
        </div>
        <div class="flex justify-center">
            <h1 class="font-bold text-3xl">Acerca de Nosotros</h1>
        </div>
        <br>
        <div class="flex justify-center">
            <h3 class="font-medium text-xl">Redes Sociales</h3>
        </div>
        <div class="flex justify-center my-4 mx-4">
            <div class="flex justify-between w-full md:w-1/6">
                <a href="#">
                    <img src="{{ asset('img/icons/facebook.svg') }}" alt="Facebook Icon" class="w-8 h-8">
                </a>
                <a href="#">
                    <img src="{{ asset('img/icons/instagram.svg') }}" alt="Instagram Icon" class="w-8 h-8">
                </a>
                <a href="#">
                    <img src="{{ asset('img/icons/twitter.svg') }}" alt="Instagram Icon" class="w-8 h-8">
                </a>
            </div>
        </div>
        <br>
        <div class="flex justify-center mt-4">
            <a href="{{ url()->previous() }}" 
                class="font-bold text-blue-800 hover:text-red-800 underline">← Regresar</a>
        </div>
    </div>

</div>

    
@endsection