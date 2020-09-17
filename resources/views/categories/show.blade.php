@extends('layouts.main')

@section('title',$category->name." - Categorías")

@section('content')
<div class="flex justify-center mt-8">
    <h1 class="text-white text-4xl font-bold" >Categoría: </h1>
</div>
<div class="md:flex md:justify-center p-2">
    <div class="flex items-start bg-white p-4 w-full md:w-1/2 rounded">
        <img 
            @if (!is_null($category->image))
                src="{{ asset("storage/categories-icon/{$category->image}")}}"
            @else
                src="{{ asset('img/logo/TechNewsLogo-Brujula.png') }}"
            @endif
        alt="Tech News Logo" class="w-10">
        <div class="block">
            <h2 class="w-auto block font-bold ml-2">{{ $category->name }}</h2>
            <span class="ml-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere repellendus quis beatae ad provident vitae adipisci illo, amet non, laboriosam ex, ducimus libero? Voluptatibus laudantium voluptas rem eveniet cupiditate ratione!</span>
        </div>
    </div>
</div>
<div class="flex justify-center mt-4">
    <a href="{{ url()->previous() }}" class="text-white hover:text-red-800 underline">← Regresar</a>
</div>
<div class="mt-4">
    <div class="flex flex-col md:flex-row flex-wrap h-full">
        @foreach($news as $item)
            <div class="w-full md:w-1/3 p-2 h-full">
                    <a href="{{ route('news.show', $item->slug) }}" 
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
                            <div class="p-1 mr-1">
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
</div>
@endsection