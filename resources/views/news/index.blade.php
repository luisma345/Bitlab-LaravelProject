@extends('layouts.dashboard.dashboard')

@section('title','Noticias')
@section('h1','Noticias:')


@section('content')
    <div class="flex justify-center mt-8">
        @include('partials.ui.button', ['label' => 'Crear Noticia', 'url' => route('news.create')])
    </div>
    @if (count($news) == 0)
        <div class="flex justify-center mt-8">
            <div class="block">
                <div class="flex justify-center">
                    <img class="block w-12 text-center" src="img/icons/alert.svg" alt="Alert!">
                </div>
                <p class="block text-white text-xl">¡No hay noticias creadas!</p>
            </div>
        </div>
    @else
        @foreach($news as $item)
            <div class="md:flex md:justify-center p-2">
                    <a href="{{ route('news.show', $item->id) }}" 
                        class="flex items-center bg-white p-4 w-full md:w-1/2 rounded 
                                hover:bg-blue-800 hover:text-white">
                        <img src="img/logo/TechNewsLogo-Brujula.png" alt="Tech News Logo" class="w-8 rounded-full">
                        <span class="font-bold ml-2">Título: {{ $item->title }} </span>
                        <span class="ml-2">Descrición: {{ $item->description }} </span>
                    </a>
            </div>
        @endforeach
    @endif
@endsection