@extends('layouts.dashboard.dashboard')

@section('title','Categoría '.$category->name)

@section('h1','Nombre de la Categoría: '.$category->name)

@section('content-categories')
    <div class="flex justify-center mt-8">
        <div class="block">
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <span for="name" class="font-bold text-white mb-2 underline">Descripción de la categoría:</span><br>
                        </div>
                        <p name="description"  class="text-white px-4 py-1 border-2 border-black border-solid rounded">
                            {{$category->description}}
                        </p>
                        <div class="flex justify-center mt-8">
                            @include('partials.ui.blueLinkButton', ['label' => 'Actualizar Categoría', 'url' => route('categories.edit', $category->id)])
                        </div>
                        <div class="flex justify-center mt-4">
                            <form action="{{ route('categories.destroy', $category->id) }}" 
                                method="POST" class="mb-4" onsubmit="return confirm('¿Realmente quieres eliminar esta categoría?');">
                                @csrf
                                @method('DELETE')
                                @include('partials.ui.redButton', ['label' => 'Eliminar Categoría'])
                            </form>
                        </div>
                        <div class="flex justify-center mt-4">
                            <a href="{{ route('categories.index') }}" class="text-white hover:text-red-800 underline">← Regresar</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
@endsection