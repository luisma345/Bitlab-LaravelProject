@extends('layouts.dashboard.writerDashboard')

@section('title','Editar Noticia')

@section('h1','Editar Noticia:')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="block">
            <form action="{{ route('writer.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
                
            <div class="flex justify-center mb-4">
                <div class="block w-10/12">
                    <div class="flex justify-center">
                        <label for="title" class="font-bold text-white">Título de la noticia:</label><br>
                    </div>
                    <div class="flex justify-center">
                        <input type="text" name="title" class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2 w-full"
                            value="{{ old('title', $news->title) }}" required autofocus>
                    </div>
                    @error('title')
                        <div class="text-red-800 text-center">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="flex justify-center mb-4">
                <div class="block">
                    <div class="flex justify-center">
                        <label for="description" class="font-bold text-white mb-2">Descripción de la noticia:</label><br>
                    </div>
                    <textarea name="description" rows="4" cols="75"
                    class="bg-white px-4 py-1 border-2 border-black border-solid rounded" required>{{ old('description',$news->description)}}</textarea>
                    @error('description')
                        <div class="text-red-800 text-center">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="flex justify-center mb-4 w-full">
                <div class="block w-full">
                    <div class="flex justify-center">
                        <label for="article" class="font-bold text-white mb-2">Artículo:</label><br>
                    </div>
                    <textarea name="article" class="ckeditor" required>{{ old('article', $news->article)}}</textarea>
                    @error('article')
                        <div class="text-red-800 text-center">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="flex justify-center mb-4">
                <div class="block">
                    <div class="flex justify-center">
                        <label for="publication_date" class="font-bold text-white">Fecha a publicar</label><br>
                    </div>
                    <div class="flex justify-center">
                        <input type="text" name="publication_date" id="publication_date" value="{{ old('publication_date', $news->publication_date) }}"
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2" 
                            placeholder="Seleccione una fecha" required>
                    </div>
                    @error('publication_date')
                        <div class="text-red-800 text-center">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="flex justify-center mb-4">
                <div class="block">
                    <div class="flex justify-center">
                        <label for="article" class="font-bold text-white mb-2">Categoría:</label><br>
                    </div>
                    <div class="flex justify-center">
                        <select name="category_id" id="" class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2" required>
                            <option value="">Seleccione una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id',$news->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <div class="text-red-800 text-center">{{ $message }}</div>
                    @enderror
                </div>
            </div>

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
                        @error('image')
                                <div class="text-red-800 text-center">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="flex justify-center">
                    @include('partials.ui.redButton', ['label' => 'Actualizar Noticia'])
                </div>
            </form>
            <div class="flex justify-center mt-4">
                <a href="{{ route('writer.news.show', $news->id) }}" class="text-white hover:text-red-800 underline">← Regresar</a>
            </div>
        </div>
    </div>
    
@endsection