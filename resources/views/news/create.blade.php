@extends('layouts.dashboard.dashboard')

@section('title','Crear Noticia')

@section('h1','Crear Noticia:')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="block">
            <form action="{{ route('news.store') }}" method="POST">
                @csrf
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="title" class="font-bold text-white">Título de la noticia:</label><br>
                        </div>
                        <input type="text" name="title" class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2">
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="description" class="font-bold text-white mb-2">Descripción de la noticia:</label><br>
                        </div>
                        <textarea name="description" rows="4" cols="75" class="bg-white px-4 py-1 border-2 border-black border-solid rounded"></textarea>
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="article" class="font-bold text-white mb-2">Artículo:</label><br>
                        </div>
                        <textarea name="article" rows="25" cols="75" class="bg-white px-4 py-1 border-2 border-black border-solid rounded"></textarea>
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="publication_date" class="font-bold text-white">Fecha a publicar</label><br>
                        </div>
                        <input type="text" name="publication_date" id="publication_date" 
                                class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2" 
                                placeholder="Seleccione una fecha">
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="article" class="font-bold text-white mb-2">Categoría:</label><br>
                        </div>
                        <select name="category_id" id="" class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2">
                            <option value="">Seleccione una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex justify-center">
                    @include('partials.ui.redButton', ['label' => 'Guardar'])
                </div>
            </form>
            <div class="flex justify-center mt-4">
                <a href="{{ route('news.index') }}" class="text-white hover:text-red-800 underline">← Regresar</a>
            </div>
        </div>
    </div>
    
@endsection