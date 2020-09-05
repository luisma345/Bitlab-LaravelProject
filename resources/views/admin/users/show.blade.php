@extends('layouts.dashboard.dashboard')

@section('title','Usuario '.$users->user_name)

@section('h1','Username: '.$users->user_name)

@section('content')
    <div class="flex justify-center mt-8">
        <div class="block">
            @if (!is_null($users->image))
                <div class="flex justify-center mb-4">
                    <div class="w-24">
                        <img src="{{ asset("storage/users-profilePicture/{$users->image}")}}" alt="" class="rounded-full">
                    </div>
                </div>
            @endif
            <div class="flex mb-4 w-full">
                <span class="font-bold text-white mr-2">Nombre:</span>
                    <p class="text-white"> {{ $users->first_name }} </p>
            </div>

            <div class="flex mb-4 ">
                <span class="font-bold text-white mr-2">Apellido:</span>
                    <p class="text-white"> {{ $users->last_name }} </p>
            </div>

            <div class="flex mb-4">
                   <span class="font-bold text-white mr-2">Correo:</span>
                       <p class="text-white"> {{ $users->email }} </p>
            </div>

            <div class="flex mb-4">
                <span class="font-bold text-white mr-2">Edad:</span>
                    <p class="text-white"> {{ $users->age }} </p>
            </div>

            <div class="flex mb-4">
                <span class="font-bold text-white mr-2">Rol:</span>
                    <p class="text-white"> {{ $users->role->name }} </p>
            </div>
                        
            <div class="flex justify-center mt-8">
                @include('partials.ui.blueLinkButton', ['label' => 'Actualizar Usuario', 'url' => route('admin.users.edit', $users->id)])
            </div>
            <div class="flex justify-center mt-4">
                <form action="{{ route('admin.users.destroy', $users->id) }}" 
                method="POST" class="mb-4" onsubmit="return confirm('¿Realmente quieres eliminar este usuario?');">
                    @csrf
                    @method('DELETE')
                    @include('partials.ui.redButton', ['label' => 'Eliminar Usuario'])
                </form>
            </div>
            <div class="flex justify-center mt-4">
                <a href="{{ url()->previous() == route('admin.users.edit', $users->id) ? route('admin.users.index') : url()->previous() }}" 
                    class="text-white hover:text-red-800 underline">← Regresar</a>
            </div>
        </div>
    </div>
    
@endsection