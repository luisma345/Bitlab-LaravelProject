@extends('layouts.dashboard.adminDashboard')

@section('title','Crear Categoría')

@section('h1','Crear Categoría:')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="block">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="name" class="font-bold text-lg">Nombre de la categoría:</label><br>
                        </div>
                        <input type="text" name="name" class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2" value="{{ old('name')}}" required autofocus>
                        @error('name')
                            <div class="text-red-800 text-center">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="description" class="font-bold text-lg mb-2">Descripción de la categoría:</label><br>
                        </div>
                        <textarea name="description" rows="4" cols="25" class="roboto texto-lg bg-white px-4 py-1 border-2 border-black border-solid rounded" required>{{ old('description')}}</textarea>
                        @error('description')
                            <div class="text-red-800 text-center">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="image" class="font-bold text-lg">Icono de la categoría</label><br>
                        </div>
                        <input type="file" name="image" accept="image/*" 
                                class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2" required>
                        @error('image')
                            <div class="text-red-800 text-center">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-center">
                    @include('partials.ui.redButton', ['label' => 'Guardar'])
                </div>
            </form>
            <div class="flex justify-center mt-4">
                <a href="{{ route('admin.categories.index') }}" class="font-bold text-blue-800 hover:text-red-800 underline">← Regresar</a>
            </div>
        </div>
    </div>
    
@endsection