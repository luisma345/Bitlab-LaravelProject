@extends('layouts.dashboard.adminDashboard')

@section('title','Actualizar Perfil Administrador')

@section('h1','Actualizar Perfil:')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="block">
            <form action="{{ route('admin.users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                @if (!is_null($users->image))
                <div class="flex justify-center mb-4">
                    <div class="w-24">
                        <img src="{{ asset("storage/users-profilePicture/{$users->image}")}}" alt="" class="rounded-full">
                    </div>
                </div>
            @endif

              <div class="flex mb-4 w-full">
                     <div class="flex justify-end items-center w-5/12">
                        <label for="user_name" class="font-bold text-white mr-2">Usuario:</label>
                    </div>
                    <div class="w-7/12">
                            <input type="user_name" name="user_name" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ $users->user_name }}">
                    </div>
                </div>

                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="email" class="font-bold text-white mr-2">Correo:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="email" name="email" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ $users->email }}">
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
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ $users->first_name }}">
                   </div>
               </div>

                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="last_name" class="font-bold text-white mr-2">Apellido:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="text" name="last_name" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ $users->last_name }}">
                   </div>
               </div>

               <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                        <label for="age" class="font-bold text-white mr-2">Edad:</label>
                    </div>
                    <div class="w-7/12">
                            <input type="number" name="age" min="0" max="100" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ $users->age }}">
                    </div>
                </div>


                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                        <div>
                            <label for="roles_id" class="font-bold text-white mr-2">Rol:</label>
                        </div>
                   </div>
                   <div class="flex items-center w-7/12">
                           <select type="text" name="role_id" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold">
                                <option value="">Seleccione una opción</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $users->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                           </select>
                   </div>
               </div>

                {{-- Foto de Perfil usuario --}}
                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="last_name" class="font-bold text-white mr-2">Foto de perfil:</label>
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
                <a href="{{ route('admin.users.show', $users->id) }}" class="text-white hover:text-red-800 underline">← Regresar</a>
            </div>
        </div>
    </div>
    
@endsection