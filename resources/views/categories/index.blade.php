@extends('layouts.main')

@section('title','Categorías')


@section('content')
    <div class="flex justify-center mt-8">
        <h1 class="text-4xl font-bold">Categorías:</h1>
    </div>
    @if (count($categories) == 0)
        <div class="flex justify-center my-8">
            <div class="block">
                <div class="flex justify-center">
                    <img class="block w-12 text-center" src="img/icons/alert.svg" alt="Alert!">
                </div>
                <p class="block font-bold text-xl">¡No hay categorías creadas!</p>
            </div>
        </div>
    @else
        @foreach($categories as $category)
            <div class="md:flex md:justify-center p-2">
                    <a href="{{ route('categories.show', $category->slug) }}" 
                        class="flex items-center bg-white p-4 w-full md:w-1/2 rounded-lg border-blue-800 border-2 
                                hover:bg-blue-800 hover:text-white font-bold hover:font-normal">
                        <img 
                            @if (!is_null($category->image))
                                src="{{ asset("storage/categories-icon/{$category->image}")}}"
                            @else
                                src="{{ asset('img/logo/TechNewsLogo-Brujula.png') }}"
                            @endif
                        alt="Tech News Logo" class="w-8 rounded-full">
                        <span class="ml-2 text-xl"> -> {{ $category->name }} </span>
                    </a>
            </div>
        @endforeach
    @endif
@endsection