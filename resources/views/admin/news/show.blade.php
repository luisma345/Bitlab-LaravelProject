@extends('layouts.dashboard.adminDashboard')

@section('title','Noticia: '.$news->title)

@section('h1','Título de la Noticia: '.$news->title)

@section('content')

    {{-- CREATED MESSAGE --}}
    @if (session('news_created'))
        <div class="flex justify-center mb-4 w-full">
            <span class="border border-green-500 p-1 text-center text-green-500">Noticia creada con éxito</span>
        </div>
    @endif

    {{-- EDITED MESSAGE --}}
    @if (session('news_edited'))
        <div class="flex justify-center mb-4 w-full">
            <span class="border border-green-500 p-1 text-center text-green-500">Noticia editada con éxito</span>
        </div>
    @endif

    <div class="flex justify-center mt-8 pr-4">
        <div class="block">
                <div class="flex justify-center mb-4">
                    <div class="block">
                        @if (!is_null($news->image))
                            <div class="flex justify-center">
                                <img src="{{ asset("storage/news-images/{$news->image}")}}" alt="" class="w-full md:w-1/2 h-64 object-cover rounded">
                            </div>
                        @endif
                        <div class="flex justify-center">
                            <span class="font-bold text-lg mb-2">Descripción:</span><br>
                        </div>
                        <p class="text-center text-lg px-4 py-1 border-2 border-gray-400 border-solid rounded">
                            {{$news->description}}
                        </p>
                        <br>

                        <div class="flex justify-center">
                            <span class="font-bold text-lg mb-2 ">Articulo</span><br>
                        </div>
                        <div class="text-lg px-4 py-1 border-2 border-solid rounded">
                            {!! $news->article !!}
                        </div>
                        <br>

                        <div class="flex justify-center">

                            {{-- Cantidad de Likes --}}
                            <div class="flex px-4 py-1 border-2 border-solid rounded mr-4">
                                <div class="p-1 mr-2">
                                    <img src="{{ asset('img/icons/liked0.svg') }}" alt="Likes-Icon" class="w-8 h-8">
                                </div>
                                <div class="flex text-lg font-bold items-center">
                                    {{ $news->reading_histories_count }} 
                                </div>
                            </div>
                            {{-- Cantidad de Comentarios --}}
                            <div class="flex text-lg px-4 py-1 border-2 border-solid rounded">
                                <div class="p-1 rounded-full mr-2">
                                    <img src="{{ asset('img/icons/commentBlack.svg') }}" alt="Comments-Icon" class="w-8 h-8">
                                </div>
                                <div class="flex font-bold items-center">
                                    {{ $news->comments_count }} 
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="flex justify-center">
                            <span class="font-bold text-lg mb-2 ">Fecha de Publicación: </span><br>
                        </div>
                        <div class="flex justify-center">
                            <div class="text-lg font-bold px-4 py-1 border-2 border-solid rounded">
                                {{ $news->publication_date }}
                            </div>
                        </div>
                        <br>

                        <div class="flex justify-center">
                            <span class="font-bold text-lg mb-2 ">Categoría: </span><br>
                        </div>
                        <div class="flex justify-center">
                            <a href="{{ route('admin.categories.show', $news->category_id) }}" class="flex font-bold px-4 py-1 border-2 border-solid rounded hover:text-red-800 underline">
                                @if (!is_null($news->category->image))
                                    <div class="bg-white p-2 mr-2 rounded-full">
                                        <img src="{{ asset("storage/categories-icon/{$news->category->image}")}}" alt="" class="w-4 rounded-full bg-white">
                                    </div>
                                @endif
                                <div class="flex text-lg items-center">
                                    {{$news->category->name}}
                                </div>
                            </a>
                        </div>
                        <br>

                        <div class="flex justify-center">
                            <span class="font-bold text-lg mb-2 ">Escritor: </span><br>
                        </div>
                        <div class="flex justify-center">
                            <a href="{{ route('admin.users.edit', $news->writer) }}" class="flex font-bold px-4 py-1 border-2 border-solid rounded hover:text-red-800 underline">
                                @if (!is_null($news->user->image))
                                    <div class="w-8 mr-2">
                                        <img src="{{ asset("storage/users-profilePicture/{$news->user->image}")}}" alt="" class="h-8 w-full object-cover rounded-full rounded-full bg-white">
                                    </div>
                                @endif
                                <div class="flex text-lg items-center">
                                    {{ $news->user->user_name }} 
                                </div>
                            </a>
                        </div>
                        <br>

                        

                        <div class="flex justify-center mt-8">
                            @include('partials.ui.blueLinkButton', ['label' => 'Editar Noticia', 'url' => route('admin.news.edit', $news->id)])
                        </div>
                        <div class="flex justify-center mt-4">
                            <form action="{{ route('admin.news.destroy', $news->id) }}" 
                                method="POST" class="mb-4" onsubmit="return confirm('¿Realmente quieres eliminar esta noticia?');">
                                @csrf
                                @method('DELETE')
                                @include('partials.ui.redButton', ['label' => 'Eliminar Noticia'])
                            </form>
                        </div>

                        <div class="flex justify-center mt-4">
                            <a href="{{ url()->previous() == route('admin.news.edit', $news->id) || url()->previous() == route('admin.news.create')   ? route('admin.news.index') : url()->previous() }}" 
                                class="font-bold text-blue-800 hover:text-red-800 underline">← Regresar</a>
                        </div>
                        <br>

                        <div class="flex justify-center">
                            <h3 class="font-bold mb-2 text-2xl">Comentarios: </h3><br>
                        </div>
                        <br>

                        {{-- ADD COMMENTS --}}
                        <form action="{{ route('admin.news.addComent') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="news_id" hidden value="{{ $news->id }}">
                            <div class="flex justify-center mb-4">
                                <div class="block">
                                    <div class="flex justify-center">
                                        <label for="content" class="font-bold text-lg mb-2">Agrega un comentario:</label><br>
                                    </div>
                                    <textarea name="content" rows="4" cols="75" class="roboto bg-white px-4 py-1 border-2 border-black border-solid rounded" placeholder="Agrega un comentario" required></textarea>
                                    <div class="flex justify-center">
                                        @error('content')
                                            <span class="text-red-800 text-sm" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-center">
                                @include('partials.ui.redButton', ['label' => 'Agregar'])
                            </div>
                        </form>
                        <br>
                        {{-- SHOW ALL COMMENTS --}}
                        @foreach ($news->comments as $comment)
                            <div class="text-center p-4 mb-8 border-2 border-solid rounded">
                                <p class="text-xl">{{ $comment->content }}</p>
                                <span class="text-sm mt-2 text-base">Comentario por:
                                    <span class="font-bold">
                                        @if (auth()->id() != $comment->made_by)
                                            <a href="{{ route('admin.users.edit', $comment->made_by ) }}" class="hover:text-red-800 underline hover:font-bold">{{ $comment->user->user_name }}</a>
                                        @else 
                                            <span>{{ $comment->user->user_name }}</span>
                                        @endif
                                    </span>
                                </span>
                                    
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
    
@endsection