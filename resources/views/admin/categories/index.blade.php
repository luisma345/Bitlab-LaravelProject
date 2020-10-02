@extends('layouts.dashboard.adminDashboard')

@section('title','Categorías')
@section('h1','Categorías:')


@section('content')
    {{-- CREATED MESSAGE --}}
    @if (session('cat_destroy'))
        <div class="flex justify-center mb-4 w-full">
            <span class="border border-green-500 p-1 text-center text-green-500">Categoría eliminada con éxito</span>
        </div>
    @endif
    <div class="flex justify-center mt-8">
        @include('partials.ui.linkButton', ['label' => 'Crear categoría', 'url' => route('admin.categories.create')])
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
                    <a href="{{ route('admin.categories.show', $category->id) }}" 
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