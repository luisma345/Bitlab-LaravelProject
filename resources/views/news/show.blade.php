@extends('layouts.main')

@section('title',$news->title ." - Noticias")


@section('content')
    <div class="flex justify-center mt-8 pr-4">
        <div class="block">
                <div class="flex mb-4">
                    <div class="block px-4">
                        @if (!is_null($news->image))
                            <div class="flex justify-center w-full">
                                <img src="{{ asset("storage/news-images/{$news->image}")}}" alt="" class="w-1/2 object-cover object-top rounded">
                            </div>
                        @endif
                        <div class="flex justify-left mt-4">
                        <h1 class="text-white px-4 text-4xl font-bold">{{$news->title}}</h1>
                        </div>
                        <p class="text-white text-justify px-4 py-1">
                            {{$news->description}}
                        </p>
                        <br>
                        <div class="text-white px-4 py-1">
                            {!! $news->article !!}
                        </div>

                        <div class="flex px-4">
                            <div class="flex text-white px-4 py-1 mr-4">
                            {{-- Cantidad de Likes --}}
                            @if (!Auth::guest())
                                @if ($readingHistory->liked)
                                    <form action="{{ route('news.unliked', $news->id )}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="PUT">
                                        <button>
                                            <div class="p-1 mr-2">
                                                <img src="{{ asset('img/icons/liked1.svg') }}" alt="Likes-Icon" class="w-6 h-6">
                                            </div>
                                        </button>
                                    </form>   
                                @else
                                     <form action="{{ route('news.liked', $news->id )}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="PUT">
                                        <button>
                                            <div class="p-1 mr-2">
                                                <img src="{{ asset('img/icons/liked0.svg') }}" alt="Likes-Icon" class="w-6 h-6">
                                            </div>
                                        </button>
                                    </form>    
                                @endif
                            @else
                                <div class="p-1 mr-2">
                                    <img src="{{ asset('img/icons/liked0.svg') }}" alt="Likes-Icon" class="w-6 h-6">
                                </div>
                            @endif
                                <div class="flex items-center">
                                    {{ $news->reading_histories_count }} 
                                </div>  
                            </div>
                            {{-- Cantidad de Comentarios --}}
                            <div class="flex text-white px-4 py-1">
                                <div class="p-1 rounded-full mr-2">
                                    <img src="{{ asset('img/icons/comment.svg') }}" alt="Comments-Icon" class="w-6 h-6">
                                </div>
                                <div class="flex items-center">
                                    {{ $news->comments_count }} 
                                </div>
                            </div>
                            {{-- Category --}}
                            <div class="flex text-white px-4 py-1">
                                <div class="flex items-center">
                                    Categoría:
                                </div>
                                <a href="{{ route('categories.show', $news->category_id) }}" class="flex text-white mx-2 py-1 hover:text-red-800 underline">
                                    <div class="flex items-center">
                                        {{$news->category->name}}
                                    </div>
                                    @if (!is_null($news->category->image))
                                        <div class="bg-white w-6 h-6 p-1 mx-2 rounded-full">
                                            <img src="{{ asset("storage/categories-icon/{$news->category->image}")}}" alt="" class="w-4 rounded-full bg-white">
                                        </div>
                                    @endif
                                </a>
                            </div>
                        </div>
                        <br>

                        <div class="flex justify-end px-4 mt-2">
                            <div class="flex items-center text-white font-medium">
                                Fecha de Publicación:
                            </div>
                            <div class="flex justify-center">
                                <div class="text-white px-2 py-1">
                                    {{ $news->publication_date }}
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end px-4 mt-2">
                            <div class="flex items-center text-white font-medium">
                                Escritor:
                            </div>
                            @if (!Auth::guest() && auth()->user()->role_id == 3)
                                <a href="{{ route('admin.users.edit', $news->writer) }}" class="flex text-white px-2 py-1 hover:text-red-800 underline">
                            @else
                                <a class="flex text-white px-2 py-1">
                            @endif
                                <div class="flex items-center">
                                    {{ $news->user->user_name }} 
                                </div>
                                @if (!is_null($news->user->image))
                                    <div class="w-8 mx-2">
                                        <img src="{{ asset("storage/users-profilePicture/{$news->user->image}")}}" alt="" class="w-8 h-full object-full rounded-full bg-white">
                                    </div>
                                @endif
                            </a>
                        </div>
                        
                        
                        <br>


                        <div class="flex justify-center mt-4">
                            <a href="{{ url()->previous() }}" 
                                class="text-white hover:text-red-800 underline">← Regresar</a>
                        </div>
                        <br>

                        <div class="flex justify-center">
                            <h3 class="font-bold text-white mb-2 text-2xl">Comentarios: </h3><br>
                        </div>

                        {{-- SHOW ALL COMMENTS --}}
                        <div class="flex justify-center">
                            <div class="block w-10/12">
                                @foreach ($news->comments as $comment)
                                    <div class="text-white text-center p-4 mb-8 border-2 border-solid rounded">
                                        <p class="text-xl">{{ $comment->content }}</p>
                                        <span class="text-sm mt-2">Comentario por: 
                                            @if (!Auth::guest() && auth()->user()->role_id == 3 && auth()->id() != $comment->made_by)
                                                <a href="{{ route('admin.users.edit', $comment->made_by ) }}" class="hover:text-red-800 underline hover:font-bold">{{ $comment->user->user_name }}</a>
                                            @else
                                                {{ $comment->user->user_name }}
                                            @endif
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @if (!Auth::guest())
                            {{-- ADD COMMENTS --}}
                            <form action="{{ route('news.addComent') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="news_id" hidden value="{{ $news->id }}">
                                <div class="flex justify-center mb-4">
                                    <div class="block">
                                        <div class="flex justify-center">
                                            <label for="content" class="font-bold text-white mb-2">Agrega un comentario:</label><br>
                                        </div>
                                        <textarea name="content" rows="4" cols="75" class="bg-white px-4 py-1 border-2 border-black border-solid rounded" placeholder="Agrega un comentario"></textarea>
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
                        @else
                            <div class="flex justify-center">
                                <div class="block p-4 rounded border border-white border-2">
                                    <div class="flex justify-center">
                                        <img class="block w-8 text-center" src="{{ asset('img/icons/alert.svg')}}" alt="Alert!">
                                    </div>
                                    <p class="block text-white">¡Inicia Sesión para poder comentar!</p>
                                    <div class="flex justify-center mt-4">
                                        <a href='{{ route('login') }}' class='block mt-1 px-2 font-semibold rounded text-black bg-gray-200 
                                            rounded hover:bg-red-800 hover:text-white hover:font-normal md:mt-0 md:ml-2'>
                                            <div class="flex items-center">
                                                <svg class="h-4 w-4 fill-current mr-1" viewBox="-42 0 512 512.002" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="m210.351562 246.632812c33.882813 0 63.222657-12.152343 87.195313-36.128906 23.972656-23.972656 36.125-53.304687 36.125-87.191406 0-33.875-12.152344-63.210938-36.128906-87.191406-23.976563-23.96875-53.3125-36.121094-87.191407-36.121094-33.886718 0-63.21875 12.152344-87.191406 36.125s-36.128906 53.308594-36.128906 87.1875c0 33.886719 12.15625 63.222656 36.132812 87.195312 23.976563 23.96875 53.3125 36.125 87.1875 36.125zm0 0"/><path d="m426.128906 393.703125c-.691406-9.976563-2.089844-20.859375-4.148437-32.351563-2.078125-11.578124-4.753907-22.523437-7.957031-32.527343-3.308594-10.339844-7.808594-20.550781-13.371094-30.335938-5.773438-10.15625-12.554688-19-20.164063-26.277343-7.957031-7.613282-17.699219-13.734376-28.964843-18.199219-11.226563-4.441407-23.667969-6.691407-36.976563-6.691407-5.226563 0-10.28125 2.144532-20.042969 8.5-6.007812 3.917969-13.035156 8.449219-20.878906 13.460938-6.707031 4.273438-15.792969 8.277344-27.015625 11.902344-10.949219 3.542968-22.066406 5.339844-33.039063 5.339844-10.972656 0-22.085937-1.796876-33.046874-5.339844-11.210938-3.621094-20.296876-7.625-26.996094-11.898438-7.769532-4.964844-14.800782-9.496094-20.898438-13.46875-9.75-6.355468-14.808594-8.5-20.035156-8.5-13.3125 0-25.75 2.253906-36.972656 6.699219-11.257813 4.457031-21.003906 10.578125-28.96875 18.199219-7.605469 7.28125-14.390625 16.121094-20.15625 26.273437-5.558594 9.785157-10.058594 19.992188-13.371094 30.339844-3.199219 10.003906-5.875 20.945313-7.953125 32.523437-2.058594 11.476563-3.457031 22.363282-4.148437 32.363282-.679688 9.796875-1.023438 19.964844-1.023438 30.234375 0 26.726562 8.496094 48.363281 25.25 64.320312 16.546875 15.746094 38.441406 23.734375 65.066406 23.734375h246.53125c26.625 0 48.511719-7.984375 65.0625-23.734375 16.757813-15.945312 25.253906-37.585937 25.253906-64.324219-.003906-10.316406-.351562-20.492187-1.035156-30.242187zm0 0"/>
                                                </svg>
                                                <span>Ingresar</span>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        @endif
                        <br>
                        
                    </div>
                </div>
        </div>
    </div>
    
@endsection