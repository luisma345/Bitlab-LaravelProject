@extends('layouts.categories.category')

@section('title','Categorías')

@section('content-categories')
    <div class="flex justify-center mt-8">
        @include('partials.ui.button', ['label' => 'Crear categoría', 'url' => route('categories.create')])
    </div>
    @if (count($categories) == 0)
        <div class="flex justify-center mt-8">
            <div class="block">
                <div class="flex justify-center">
                    <img class="block w-12 text-center" src="img/icons/alert.svg" alt="Alert!">
                </div>
                <p class="block text-white text-xl">¡No hay categorías creadas!</p>
            </div>
        </div>
    @else
        @foreach($categories as $category)
            <div class="md:flex md:justify-center p-2">
                    <a href="{{ route('categories.show', $category->id) }}" 
                        class="flex items-center bg-white p-4 w-full md:w-1/2 rounded 
                                hover:bg-blue-800 hover:text-white">
                        <img src="img/logo/TechNewsLogo-Brujula.png" alt="Tech News Logo" class="w-8 rounded-full">
                        <span class="font-bold ml-2">Nombre de la categoría: {{ $category->name }} </span>
                    </a>
            </div>
        @endforeach
    @endif
@endsection