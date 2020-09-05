@extends('layouts.dashboard.dashboard')

@section('title','Categoría '.$category->name)

@section('h1','Nombre de la Categoría: '.$category->name)

@section('content')
    <div class="flex justify-center mt-8">
        <div class="block">
                <div class="flex justify-center mb-4">
                    <div class="block">
                        @if (!is_null($category->image))
                            <div class="flex justify-center mb-4">
                                <div class="bg-white p-2 rounded-full">
                                    <img src="{{ asset("storage/categories-icon/{$category->image}")}}" alt="" class="w-8 rounded-full">
                                </div>
                            </div>
                        @endif
                        <div class="flex justify-center">
                            <span for="name" class="font-bold text-white mb-2 underline">Descripción de la categoría:</span><br>
                        </div>
                        <p class="text-white px-4 py-1 border-2 border-black border-solid rounded">
                            {{$category->description}}
                        </p>
                        <br>

                        <div class="flex justify-center">
                            <span for="name" class="text-white mb-2 underline">Cantidad de Noticias:</span><br>
                        </div>
                        <p class="text-white text-center px-4 py-1 border-2 border-black border-solid rounded">
                            {{$category->news_count}}
                        </p>

                        <div class="flex justify-center mt-8">
                            @include('partials.ui.blueLinkButton', ['label' => 'Actualizar Categoría', 'url' => route('admin.categories.edit', $category->id)])
                        </div>
                        <div class="flex justify-center mt-4">
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" 
                                method="POST" class="mb-4" onsubmit="return confirm('¿Realmente quieres eliminar esta categoría?');">
                                @csrf
                                @method('DELETE')
                                @include('partials.ui.redButton', ['label' => 'Eliminar Categoría'])
                            </form>
                        </div>
                        <div class="flex justify-center mt-4">
                            <a href="{{ url()->previous() == route('admin.categories.edit', $category->id) ? route('admin.categories.index') : url()->previous() }}" 
                                class="text-white hover:text-red-800 underline">← Regresar</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
@endsection