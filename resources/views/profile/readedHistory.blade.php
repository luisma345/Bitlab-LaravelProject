@extends('layouts.dashboard.profileDashboard')

@section('title', 'Historial - '.auth()->user()->user_name)

@section('content')
            <div class="flex justify-center my-4 w-full">
                <h2 class="font-bold text-white text-2xl mr-2">Historial</h2>
            </div>
            @if (count($readed) == 0)
                <div class="flex justify-center mt-8">
                    <div class="block">
                        <div class="flex justify-center">
                            <img class="block w-12 text-center" src="{{ asset('img/icons/alert.svg')}}" alt="Alert!">
                        </div>
                        <p class="block text-white text-xl">¡No has leido ninguna noticia!</p>
                    </div>
                </div>
            @else

            @foreach($readed as $item)
            <div class="md:flex md:justify-center my-2">
                <div class="w-full md:w-2/3">
                    <a href="{{ route('news.show', $item->news->id) }}" 
                        class="flex items-center bg-white p-2 w-full h-full rounded 
                                hover:bg-blue-800 hover:text-white">
                        <div class="block w-1/3">
                            <div class="flex justify-center pr-2 w-full">
                                @if (!is_null($item->news->image))
                                    <img src="{{ asset("storage/news-images/{$item->news->image}")}}" alt="" class="w-full h-32 object-cover rounded">
                                @else
                                    <img src="{{ asset('img/logo/TechNewsLogo-Brujula.png') }}" alt="Tech News Logo" class="h-32 object-cover ">
                                @endif
                            </div>
                        </div>
                        <div class="block w-2/3">
                            <h2 class="font-bold">{{ \Illuminate\Support\Str::limit($item->news->title, 40)}} </h2>
                            <div class="md:h-20">
                                <p class="mb-2">
                                    Descripción: {{ \Illuminate\Support\Str::limit($item->news->description, 140) }}
                                </p>
                            </div>
                            <div class="flex font-bold px-4 py-1 border-2 border-solid rounded mr-4 bg-white">
                                <div class="p-1 mr-1">
                                    @if ($item->liked)
                                        <img src="{{ asset('img/icons/liked1.svg') }}" alt="Likes-Icon" class="w-4 h-4">
                                    @else
                                        <img src="{{ asset('img/icons/liked0.svg') }}" alt="Likes-Icon" class="w-4 h-4">
                                    @endif
                                </div>
                                <div class="flex items-center text-black">
                                    {{ $item->news->reading_histories_count }} 
                                </div>
                                <div class="p-1 ml-2 mr-1">
                                    <img src="{{ asset('img/icons/commentBlack.svg') }}" alt="Comments-Icon" class="w-4 h-4">
                                </div>
                                <div class="flex items-center text-black">
                                    {{ $item->news->comments_count }} 
                                </div>
                                <div class="flex items-center ml-2 text-black">
                                    <span class="mr-2 font-normal">Escritor:</span>
                                    <div class="flex items-center">
                                        {{ $item->news->user->user_name }} 
                                        @if (!is_null($item->news->user->image))
                                            <div class="w-6 ml-1">
                                                <img src="{{ asset("storage/users-profilePicture/{$item->news->user->image}")}}" alt="" class="h-6 w-full object-cover rounded-full bg-white">
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
            <div class="flex justify-center my-8">
                <div class="block">
                    <div class="flex mt-1">
                        @if ($readed->hasPages())
                            <span class="text-white mx-2">
                                @if (!$readed->onFirstPage())
                                    <a href="{{ $readed->previousPageUrl() }}" class="hover:text-red-800 underline" >←</a>
                                @else
                                    ←
                                @endif
                            </span>
                            <span class="text-white mx-2">Página {{ $readed->currentPage() }}/{{$readed->lastPage()}}</span>
                            <span class="text-white mx-2">
                                @if ($readed->hasMorePages())
                                    <a href="{{ $readed->nextPageUrl() }}" class="hover:text-red-800 underline">→</a>
                                @else
                                    →
                                @endif
                            </span>
                        @endif
                    </div>
                </div>
            </div>
    @endif
    
@endsection