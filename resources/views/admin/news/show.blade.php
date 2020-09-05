@extends('layouts.dashboard.dashboard')

@section('title','Noticia: '.$news->title)

@section('h1','Título de la Noticia: '.$news->title)

@section('content')
    <div class="flex justify-center mt-8 pr-4">
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

                            {{-- Cantidad de Likes --}}
                            <div class="flex text-white px-4 py-1 border-2 border-solid rounded mr-4">
                                <div class="p-1 mr-2">
                                    <img src="{{ asset('img/icons/heart.svg') }}" alt="Likes-Icon" class="w-8 h-8">
                                </div>
                                <div class="flex items-center">
                                    {{ $news->reading_histories_count }} 
                                </div>
                            </div>
                            {{-- Cantidad de Comentarios --}}
                            <div class="flex text-white px-4 py-1 border-2 border-solid rounded">
                                <div class="p-1 rounded-full mr-2">
                                    <img src="{{ asset('img/icons/comment.svg') }}" alt="Comments-Icon" class="w-8 h-8">
                                </div>
                                <div class="flex items-center">
                                    {{ $news->comments_count }} 
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="flex justify-center">
                            <span class="font-bold text-white mb-2 ">Fecha de Publicación: </span><br>
                        </div>
                        <div class="flex justify-center">
                            <div class="text-white px-4 py-1 border-2 border-solid rounded">
                                {{ $news->publication_date }}
                            </div>
                        </div>
                        <br>

                        <div class="flex justify-center">
                            <span class="font-bold text-white mb-2 ">Categoría: </span><br>
                        </div>
                        <div class="flex justify-center">
                            <a href="{{ route('categories.show', $news->category_id) }}" class="flex text-white px-4 py-1 border-2 border-solid rounded hover:text-red-800 underline">
                                @if (!is_null($news->category->image))
                                    <div class="bg-white p-2 mr-2 rounded-full">
                                        <img src="{{ asset("storage/categories-icon/{$news->category->image}")}}" alt="" class="w-4 rounded-full bg-white">
                                    </div>
                                @endif
                                <div class="flex items-center">
                                    {{$news->category->name}}
                                </div>
                            </a>
                        </div>
                        <br>

                        <div class="flex justify-center">
                            <span class="font-bold text-white mb-2 ">Escritor: </span><br>
                        </div>
                        <div class="flex justify-center">
                            <a href="{{ route('users.show', $news->writer) }}" class="flex text-white px-4 py-1 border-2 border-solid rounded hover:text-red-800 underline">
                                @if (!is_null($news->user->image))
                                    <div class="mr-2">
                                        <img src="{{ asset("storage/users-profilePicture/{$news->user->image}")}}" alt="" class="w-8 rounded-full bg-white">
                                    </div>
                                @endif
                                <div class="flex items-center">
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
                            <a href="{{ route('admin.news.index') }}" class="text-white hover:text-red-800 underline">← Regresar</a>
                        </div>
                        <br>

                        <div class="flex justify-center">
                            <h3 class="font-bold text-white mb-2 text-2xl">Comentarios: </h3><br>
                        </div>
                        @foreach ($news->comments as $comment)
                            <div class="text-white text-center p-4 mb-8 border-2 border-solid rounded">
                                {{ $comment->content }}<br>
                                Comentario por: <a href="{{ route('users.show', $comment->made_by ) }}" class="hover:text-red-800 underline hover:font-bold">{{ $comment->user->user_name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
    
@endsection