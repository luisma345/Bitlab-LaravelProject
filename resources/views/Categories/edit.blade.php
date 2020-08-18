@extends('layouts.categories.category')

@section('title','Actualizar Categoría')

@section('h1','Actualizar Categoría:')

@section('content-categories')
    <div class="flex justify-center mt-8">
        <div class="block">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="name" class="font-bold text-white">Nombre de la categoría:</label><br>
                        </div>
                        <input type="text" name="name" 
                                class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2"
                                value="{{$category->name}}">
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="name" class="font-bold text-white mb-2">Descripción de la categoría:</label><br>
                        </div>
                    <textarea name="description" rows="4" cols="25" class="bg-white px-4 py-1 border-2 border-black border-solid rounded">{{$category->description}}</textarea>
                    </div>
                </div>
                <div class="flex justify-center">
                    @include('partials.ui.redButton', ['label' => 'Acualizar Categoría'])
                </div>
            </form>
            <div class="flex justify-center mt-4">
                <a href="{{ route('categories.show', $category->id) }}" class="text-white hover:text-red-800 underline">← Regresar</a>
            </div>
        </div>
    </div>
    
@endsection