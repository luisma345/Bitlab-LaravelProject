@extends('layouts.dashboard.dashboard')

@section('title','Noticia: '.$news->title)

@section('h1','Título de la Noticia: '.$news->title)

@section('content')
    <div class="flex justify-center mt-8">
        <div class="block">
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <span class="font-bold text-white mb-2 ">Descripción:</span><br>
                        </div>
                        <p class="text-white text-center px-4 py-1 border-2 border-solid rounded">
                            {{$news->description}}
                        </p>
                        <br>

                        <div class="flex justify-center">
                            <span class="font-bold text-white mb-2 ">Articulo</span><br>
                        </div>
                        <p class="text-white px-4 py-1 border-2 border-solid rounded">
                            {!! $news->article !!}
                            
                        </p>
                        <br>

                        <div class="flex justify-center">
                            <span class="font-bold text-white mb-2 ">Fecha de Publicación: </span><br>
                        </div>
                        <p class="text-white px-4 py-1 border-2 border-solid rounded">
                            {{ $news->publication_date }}
                        </p>
                        <br>

                        <div class="flex justify-center">
                            <span class="font-bold text-white mb-2 ">Categoría: </span><br>
                        </div>
                        <div class="flex justify-center">
                            <a href="{{ route('categories.show', $news->category_id) }}" class="text-white px-4 py-1 border-2 border-solid rounded hover:text-red-800 underline">
                                {{ $news->category->name }} 
                            </a>
                        </div>
                        <br>

                        <div class="flex justify-center">
                            <span class="font-bold text-white mb-2 ">Escritor: </span><br>
                        </div>
                        <div class="flex justify-center">
                            <a href="{{ route('categories.show', $news->created_by) }}" class="text-white px-4 py-1 border-2 border-solid rounded hover:text-red-800 underline">
                                {{ $news->adminUser->user_name }} 
                            </a>
                        </div>

                        <div class="flex justify-center mt-8">
                            @include('partials.ui.blueLinkButton', ['label' => 'Editar Noticia', 'url' => route('news.edit', $news->id)])
                        </div>
                        <div class="flex justify-center mt-4">
                            <form action="{{ route('news.destroy', $news->id) }}" 
                                method="POST" class="mb-4" onsubmit="return confirm('¿Realmente quieres eliminar esta noticia?');">
                                @csrf
                                @method('DELETE')
                                @include('partials.ui.redButton', ['label' => 'Eliminar Noticia'])
                            </form>
                        </div>
                        <div class="flex justify-center mt-4">
                            <a href="{{ route('news.index') }}" class="text-white hover:text-red-800 underline">← Regresar</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
@endsection