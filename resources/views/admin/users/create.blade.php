@extends('layouts.dashboard.adminDashboard')

@section('title','Crear Usuario')

@section('h1','Crear Usuario:')

@section('content')
    <div class="flex justify-center mt-8 w-full">
        <div class="block w-full">
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- USERNAME --}}
                <div class="flex mb-4 w-full">
                     <div class="flex justify-end items-center w-5/12">
                        <label for="user_name" class="font-bold text-white mr-2">Usuario:</label>
                    </div>
                    <div class="w-7/12">
                            <input type="user_name" name="user_name" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ old('user_name') }}" required autofocus>
                    </div>
                </div>
                @error('user_name')
                    <div class="flex justify-center mb-4 w-full">
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div> 
                @enderror
                
                {{-- EMAIL --}}
                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="email" class="font-bold text-white mr-2">Correo:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="email" name="email" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ old('email') }}" required>
                   </div>
               </div>
               @error('email')
                    <div class="flex justify-center mb-4 w-full">
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div> 
                @enderror
                
                {{-- PASSWORD --}}
                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="password" class="font-bold text-white mr-2">Contraseña:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="password" name="password" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ old('password') }}" required>
                   </div>
               </div>
               <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                        <label for="password" class="font-bold text-white mr-2">Confirmar Contraseña:</label>
                    </div>
                    <div class="w-7/12">
                            <input type="password" name="password_confirmation"
                                class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold" required>
                    </div>
                </div>
                @error('password')
                    <div class="flex justify-center mb-4 w-full">
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div> 
                @enderror
                
                {{-- FIRST NAME --}}
                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="first_name" class="font-bold text-white mr-2">Nombre:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="text" name="first_name" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ old('first_name') }}" required>
                   </div>
               </div>
               @error('first_name')
                    <div class="flex justify-center mb-4 w-full">
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div> 
                @enderror
                
                {{-- LAST NAME --}}
                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                       <label for="last_name" class="font-bold text-white mr-2">Apellido:</label>
                   </div>
                   <div class="w-7/12">
                           <input type="text" name="last_name" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ old('last_name') }}" required>
                   </div>
               </div>
               @error('last_name')
                    <div class="flex justify-center mb-4 w-full">
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div> 
                @enderror
                
                {{-- AGE --}}
               <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                        <label for="age" class="font-bold text-white mr-2">Edad:</label>
                    </div>
                    <div class="w-7/12">
                            <input type="number" name="age" min="0" max="100" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold"
                            value="{{ old('age') }}" required>
                    </div>
                </div>
                @error('age')
                    <div class="flex justify-center mb-4 w-full">
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div> 
                @enderror
                
                {{-- ROL --}}
                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                            <div>
                                    <label for="role_id" class="font-bold text-white mr-2">Rol:</label>
                            </div>
                    </div>
                    <div class="flex items-center w-7/12">
                        <select type="text" name="role_id" 
                        class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold" required>
                                <option value="">Seleccione una opción</option>
                                @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                @error('role_id')
                    <div class="flex justify-center mb-4 w-full">
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div> 
                @enderror
                    

                {{-- PROFILE PICTURE --}}
                <div class="flex mb-4 w-full">
                    <div class="flex justify-end items-center w-5/12">
                        <label for="image" class="font-bold text-white mr-2">Foto de perfil:</label>
                    </div>
                    <div class="w-7/12">
                            <input type="file" name="image" accept="image/*" 
                            class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2 md:w-1/2">
                    </div>
                </div>
                @error('image')
                    <div class="flex justify-center mb-4 w-full">
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div> 
                @enderror
                
                <div class="flex justify-center">
                    @include('partials.ui.redButton', ['label' => 'Guardar'])
                </div>
            </form>
            <div class="flex justify-center mt-4">
                <a href="{{ route('admin.users.index') }}" class="text-white hover:text-red-800 underline">← Regresar</a>
            </div>
        </div>
    </div>
    
@endsection