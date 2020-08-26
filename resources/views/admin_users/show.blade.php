@extends('layouts.dashboard.dashboard')

@section('title','Perfil '.$adminUsers->user_name)

@section('h1','Username: '.$adminUsers->user_name)

@section('content')
    <div class="flex justify-center mt-8">
        <div class="block">

            <div class="flex mb-4 w-full">
                <span class="font-bold text-white mr-2">Nombre:</span>
                    <p class="text-white"> {{ $adminUsers->first_name }} </p>
            </div>

            <div class="flex mb-4 ">
                <span class="font-bold text-white mr-2">Apellido:</span>
                    <p class="text-white"> {{ $adminUsers->last_name }} </p>
            </div>

            <div class="flex mb-4">
                   <span class="font-bold text-white mr-2">Correo:</span>
                       <p class="text-white"> {{ $adminUsers->email }} </p>
            </div>

            <div class="flex mb-4">
                <span class="font-bold text-white mr-2">Rol:</span>
                    <p class="text-white"> {{ $adminUsers->role->name }} </p>
         </div>


                        
            <div class="flex justify-center mt-8">
                @include('partials.ui.blueLinkButton', ['label' => 'Actualizar Usuario', 'url' => route('adminUser.edit', $adminUsers->id)])
            </div>
            <div class="flex justify-center mt-4">
                <form action="{{ route('adminUser.destroy', $adminUsers->id) }}" 
                method="POST" class="mb-4" onsubmit="return confirm('¿Realmente quieres eliminar este usuario?');">
                    @csrf
                    @method('DELETE')
                    @include('partials.ui.redButton', ['label' => 'Eliminar Usuario'])
                </form>
            </div>
            <div class="flex justify-center mt-4">
                <a href="{{ route('adminUser.index') }}" class="text-white hover:text-red-800 underline">← Regresar</a>
            </div>
        </div>
    </div>
    
@endsection