@extends('layouts.dashboard.adminDashboard')

@section('title','Noticias')
@section('h1','Noticias:')


@section('content')
    <div class="flex justify-center mt-4">
        @include('partials.ui.linkButton', ['label' => 'Crear Noticia', 'url' => route('admin.news.create')])
    </div>
    <div class="flex justify-center my-2">
        <div class="block">
            <form action="{{ route('admin.news.index') }}" method="GET">
                <div class="flex items-center w-full my-2">
                    <h2 class="text-white text-xl font-bold mr-2">Buscar: </h2>
                    <input type="text" name="keyword" class="bg-white px-4 py-1 mr-2 border-2 border-black border-solid rounded font-bold w-full"
                            value="{{ request()->keyword }}">
                    @include('partials.ui.blueButton', ['label' => 'Buscar'])
                </div>

            </form>
            
        </div>
    </div>        
    @if (count($news) == 0)
        <div class="flex justify-center mt-8">
            <div class="block">
                <div class="flex justify-center">
                    <img class="block w-12 text-center" src="{{ asset('img/icons/alert.svg')}}" alt="Alert!">
                </div>
                <p class="block text-white text-sm">¡No encontramos resultados de tu búsqueda!</p>
            </div>
        </div>
    @else
        @if (!is_null($request->keyword))
            <div class="flex justify-center mt-2">
                <a href="{{ route('admin.news.index') }}" 
                    class="text-white hover:text-red-800 underline">← Limpiar busqueda</a>
            </div>
            <div class="flex justify-center mt-2">
                <span class="text-white">Cantidad de resultados: {{$news->total() }}</span>
            </div>                
        @endif
        @foreach($news as $item)
            <div class="md:flex md:justify-center my-2">
                <div class="w-full md:w-2/3">
                    <a href="{{ route('admin.news.show', $item->id) }}" 
                        class="flex items-center bg-white p-2 w-full h-full rounded 
                                hover:bg-blue-800 hover:text-white">
                        <div class="block w-1/3">
                            <div class="flex justify-center pr-2 w-full">
                                @if (!is_null($item->image))
                                    <img src="{{ asset("storage/news-images/{$item->image}")}}" alt="" class="w-full h-32 object-cover rounded">
                                @else
                                    <img src="{{ asset('img/logo/TechNewsLogo-Brujula.png') }}" alt="Tech News Logo" class="h-32 object-cover ">
                                @endif
                            </div>
                        </div>
                        <div class="block w-2/3">
                            <h2 class="font-bold">{{ \Illuminate\Support\Str::limit($item->title, 40)}} </h2>
                            <div class="md:h-20">
                                <p class="mb-2">
                                    Descripción: {{ \Illuminate\Support\Str::limit($item->description, 140) }}
                                </p>
                            </div>
                            <div class="flex font-bold px-4 py-1 border-2 border-solid rounded mr-4 bg-white">
                                <div class="p-1 mr-1">
                                    <img src="{{ asset('img/icons/liked0.svg') }}" alt="Likes-Icon" class="w-4 h-4">
                                </div>
                                <div class="flex items-center text-black">
                                    {{ $item->reading_histories_count }} 
                                </div>
                                <div class="p-1 ml-2 mr-1">
                                    <img src="{{ asset('img/icons/commentBlack.svg') }}" alt="Comments-Icon" class="w-4 h-4">
                                </div>
                                <div class="flex items-center text-black">
                                    {{ $item->comments_count }} 
                                </div>
                                <div class="flex items-center ml-2 text-black">
                                    <span class="mr-2 font-normal">Escritor:</span>
                                    <div class="flex items-center">
                                        {{ $item->user->user_name }} 
                                        @if (!is_null($item->user->image))
                                            <div class="w-6 ml-1">
                                                <img src="{{ asset("storage/users-profilePicture/{$item->user->image}")}}" alt="" class="h-6 w-full object-cover rounded-full bg-white">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
                </div>
        @endforeach
    @endif
    <div class="flex justify-center my-8">
        <div class="block">
            <div class="flex mt-1">
                @if ($news->hasPages())
                    <span class="text-white mx-2">
                        @if (!$news->onFirstPage())
                            <a href="{{ $news->previousPageUrl() }}" class="hover:text-red-800 underline" >←</a>
                        @else
                            ←
                        @endif
                    </span>
                    <span class="text-white mx-2">Página {{ $news->currentPage() }}/{{$news->lastPage()}}</span>
                    <span class="text-white mx-2">
                        @if ($news->hasMorePages())
                            <a href="{{ $news->nextPageUrl() }}" class="hover:text-red-800 underline">→</a>
                        @else
                            →
                        @endif
                    </span>
                @endif
            </div>
        </div>
    </div>
@endsection