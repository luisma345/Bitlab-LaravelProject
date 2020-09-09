@extends('layouts.dashboard.adminDashboard')

@section('title','Editar Noticia')

@section('h1','Editar Noticia:')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="block">
            <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
                
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="title" class="font-bold text-white">Título de la noticia:</label><br>
                        </div>
                        <input type="text" name="title" class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2"
                        value="{{ $news->title }}">
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="description" class="font-bold text-white mb-2">Descripción de la noticia:</label><br>
                        </div>
                        <textarea name="description" rows="4" cols="75" class="bg-white px-4 py-1 border-2 border-black border-solid rounded"
                        >{{ $news->description}}</textarea>
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block w-full">
                        <div class="flex justify-center">
                            <label for="article" class="font-bold text-white mb-2">Artículo:</label><br>
                        </div>
                        <textarea name="article" rows="25" cols="75" class="ckeditor"
                        >{{ $news->article }}</textarea>
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="publication_date" class="font-bold text-white">Fecha a publicar</label><br>
                        </div>
                        <input type="text" name="publication_date" id="publication_date" 
                                class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2" 
                                placeholder="Seleccione una fecha"
                                value="{{ $news->publication_date }}">
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
                                <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>

                {{-- Image --}}
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="image" class="font-bold text-white">Imagen de Referencia: </label><br>
                        </div>
                        @if (!is_null($news->image))
                            <div class="flex justify-center mb-4">
                                <div class="p-2">
                                    <img src="{{ asset("storage/news-images/{$news->image}")}}" alt="" class="h-64 rounded">
                                </div>
                            </div>
                        @else
                            <div class="flex justify-center mt-4 mb-4">
                                <div class="block">
                                    <div class="flex justify-center">
                                    <img class="block w-12 text-center" src="{{ asset('img/icons/alert.svg') }}" alt="Alert!">
                                    </div>
                                    <p class="block text-white text-sm">¡No hay imagen de referencia para la noticia!</p>
                                </div>
                            </div>
                            
                        @endif
                        <input type="file" name="image" accept="image/*" 
                                class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2">
                    </div>
                </div>

                <div class="flex justify-center">
                    @include('partials.ui.redButton', ['label' => 'Actualizar Noticia'])
                </div>
            </form>
            <div class="flex justify-center mt-4">
                <a href="{{ route('admin.news.show', $news->id) }}" class="text-white hover:text-red-800 underline">← Regresar</a>
            </div>
        </div>
    </div>
    
@endsection