@extends('layouts.main')

@section('title','Inicio')

@section('content')

<div class="mt-4">
    <div class="flex justify-center my-4">
        <div class="block">
            <form action="{{ route('/') }}" method="GET">
                <div class="flex justify-center">
                    <h2 class="text-white text-2xl font-bold">Buscar Noticia</h2>
                </div>
                <div class="flex items-center w-full my-2">
                    <input type="text" name="keyword" class="bg-white px-4 py-1 mr-2 border-2 border-black border-solid rounded font-bold w-full">
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
                <p class="block text-white text-xl">¡No encontramos resultados de tu búsqueda!</p>
                <br>
                <div class="flex justify-center mt-4">
                    <a href="{{ route('/') }}" 
                        class="text-white hover:text-red-800 underline">← Regresar</a>
                </div>
            </div>
        </div>
    @else
        <div class="flex flex-col md:flex-row flex-wrap h-full">
            @foreach($news as $item)
                <div class="w-full md:w-1/3 p-2 h-full">
                        <a href="{{ route('news.show', $item->id) }}" 
                            class="block items-center bg-white p-4 w-full h-full rounded 
                                    hover:bg-blue-800 hover:text-white">
                            <div class="flex justify-center mb-2 w-full">
                                @if (!is_null($item->image))
                                    <img src="{{ asset("storage/news-images/{$item->image}")}}" alt="" class="w-full h-64 object-cover rounded">
                                @else
                                    <img src="{{ asset('img/logo/TechNewsLogo-Brujula.png') }}" alt="Tech News Logo" class="h-64 ">
                                @endif
                            </div>
                            <h2 class="font-bold">{{ \Illuminate\Support\Str::limit($item->title, 40)}} </h2>
                            <div class="md:h-20">
                                <p class="mb-2">
                                    Descripción: {{ \Illuminate\Support\Str::limit($item->description, 110) }}
                                </p>
                            </div>
                            <div class="flex font-bold px-4 py-1 border-2 border-solid rounded mr-4 bg-white">
                                <div class="p-1 mr-2">
                                    @if (!Auth::guest())
                                        @if (isset($item->readingHistory[0]))
                                            @if ($item->readingHistory[0]->liked)
                                                <img src="{{ asset('img/icons/liked1.svg') }}" alt="Likes-Icon" class="w-4 h-4">
                                            @else
                                                <img src="{{ asset('img/icons/liked0.svg') }}" alt="Likes-Icon" class="w-4 h-4">
                                            @endif
                                        @else
                                            <img src="{{ asset('img/icons/liked0.svg') }}" alt="Likes-Icon" class="w-4 h-4">
                                        @endif
                                    @else
                                        <img src="{{ asset('img/icons/liked0.svg') }}" alt="Likes-Icon" class="w-4 h-4">
                                    @endif
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
                        </a>
                </div>
            @endforeach
        </div>
    @endif
    <div class="flex justify-center my-8">
        <div class="block">
            {{-- <div class="flex justify-center">
                <span class="text-white">Cantidad de noticias: {{$news->total() }}</span>
            </div> --}}
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
</div>    
    
@endsection