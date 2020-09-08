@extends('layouts.dashboard.adminDashboard')

@section('title','Actualizar Categoría')

@section('h1','Actualizar Categoría:')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="block">
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="name" class="font-bold text-white">Nombre de la categoría:</label><br>
                        </div>
                        <input type="text" name="name" 
                                class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2"
                                value="{{$category->name}}">
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="name" class="font-bold text-white mb-2">Descripción de la categoría:</label><br>
                        </div>
                    <textarea name="description" rows="4" cols="25" class="bg-white px-4 py-1 border-2 border-black border-solid rounded">{{$category->description}}</textarea>
                    </div>
                </div>

                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="image" class="font-bold text-white">Icono de la categoría:</label><br>
                        </div>
                        @if (!is_null($category->image))
                            <div class="flex justify-center mb-4">
                                <div class="bg-white p-2 rounded-full">
                                    <img src="{{ asset("storage/categories-icon/{$category->image}")}}" alt="" class="w-8 rounded-full">
                                </div>
                            </div>
                        @endif

                        <input type="file" name="image" accept="image/*" 
                                class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2">
                    </div>
                </div>

                <div class="flex justify-center">
                    @include('partials.ui.redButton', ['label' => 'Acualizar Categoría'])
                </div>
            </form>
            <div class="flex justify-center mt-4">
                <a href="{{ route('admin.categories.show', $category->id) }}" class="text-white hover:text-red-800 underline">← Regresar</a>
            </div>
        </div>
    </div>
    
@endsection