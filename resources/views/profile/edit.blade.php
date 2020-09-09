@extends('layouts.dashboard.profileDashboard')

@section('title','Actualizar Perfil')


@section('content')
    <div class="flex justify-center mt-8">
        <div class="block">
            <div class="flex justify-center mb-4 w-full">
                <h2 class="font-bold text-white text-2xl mr-2">Editar Perfil</h2>
            </div>
            <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                @if (!is_null(auth()->user()->image))
                <div class="flex justify-center mb-4">
                    <div class="w-24">
                        <img src="{{ asset("storage/users-profilePicture/{$users->image}")}}" alt="" class="rounded-full">
                    </div>
                </div>
            @endif

              <div class="flex mb-4 w-full">
                     <div class="flex justify-end items-center w-5/12">
                        <label for="user_name" class="font-bold text-white mr-2">Actualizar Usuario:</label>
                    </div>
                    <div class="w-7/12">
                            <input type="user_name" name="user_name" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ auth()->user()->user_name }}">
                    </div>
                </div>

                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="email" class="font-bold text-white mr-2">Actualizar Correo:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="email" name="email" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ auth()->user()->email }}">
                   </div>
               </div>

                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="password" class="font-bold text-white mr-2">Actualizar Contraseña:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="password" name="password" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold">
                   </div>
               </div>

                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="first_name" class="font-bold text-white mr-2">Actualizar Nombre:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="text" name="first_name" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ auth()->user()->first_name }}">
                   </div>
               </div>

                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="last_name" class="font-bold text-white mr-2">Actualizar Apellido:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="text" name="last_name" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ auth()->user()->last_name }}">
                   </div>
               </div>

               <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                        <label for="age" class="font-bold text-white mr-2">Actualizar Edad:</label>
                    </div>
                    <div class="w-7/12">
                            <input type="number" name="age" min="0" max="100" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ auth()->user()->age }}">
                    </div>
                </div>


               

                {{-- Foto de Perfil usuario --}}
                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="last_name" class="font-bold text-white mr-2">Actualizar Foto de Perfil:</label>
                   </div>
                   <div class="w-7/12">
                            <input type="file" name="image" accept="image/*" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2 w-4/5">
                   </div>
               </div>
               
                <div class="flex justify-center">
                    @include('partials.ui.redButton', ['label' => 'Acualizar Usuario'])
                </div>
            </form>
            <div class="flex justify-center mt-4">
                <a href="{{ route('profile.show', auth()->user()->id) }}" class="text-white hover:text-red-800 underline">← Regresar</a>
            </div>
        </div>
    </div>
    
@endsection