@extends('layouts.dashboard.dashboard')

@section('title','Crear Usuario')

@section('h1','Crear Usuario:')

@section('content')
    <div class="flex justify-center mt-8 w-full">
        <div class="block w-full">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="flex mb-4 w-full">
                     <div class="flex justify-end items-center w-5/12">
                        <label for="user_name" class="font-bold text-white mr-2">Usuario:</label>
                    </div>
                    <div class="w-7/12">
                            <input type="user_name" name="user_name" 
                        class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold">
                    </div>
                </div>

                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="email" class="font-bold text-white mr-2">Correo:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="email" name="email" 
                       class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold">
                   </div>
               </div>

                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="password" class="font-bold text-white mr-2">Contraseña:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="password" name="password" 
                       class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold">
                   </div>
               </div>

                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="first_name" class="font-bold text-white mr-2">Nombre:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="text" name="first_name" 
                       class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold">
                   </div>
               </div>

                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="last_name" class="font-bold text-white mr-2">Apellido:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="text" name="last_name" 
                       class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold">
                   </div>
               </div>

               <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                        <label for="age" class="font-bold text-white mr-2">Edad:</label>
                    </div>
                    <div class="w-7/12">
                            <input type="number" name="age" min="0" max="100" 
                        class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold">
                    </div>
                </div>
                
                <div class="flex justify-center">
                    @include('partials.ui.redButton', ['label' => 'Guardar'])
                </div>
            </form>
            <div class="flex justify-center mt-4">
                <a href="{{ route('users.index') }}" class="text-white hover:text-red-800 underline">← Regresar</a>
            </div>
        </div>
    </div>
    
@endsection