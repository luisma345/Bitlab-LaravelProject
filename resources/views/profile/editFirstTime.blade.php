<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar Registors - TECH NEWS</title>
    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('img/logo/TechNewsLogo-Brujula.png')}}" type="image/png">
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-white">
    <div class="flex justify-center h-screen">
        <div class="flex flex-col justify-center items-center w-full">
        <form class="rounded-lg border-blue-800 border-2 p-4 rounded" action="{{ route('profile.updateFirstTime') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="flex justify-center mb-2">
                    <img src="{{ asset('img/logo/TechNewsLogo.png') }}" alt="Logo TecNews" width="150px" class="p-1">
                </div>
                <div class="block text-center pb-2">
                    <span class="font-bold text-xl">Completar Registro</span>
                </div>


                <div class="block text-center pb-2">
                    <label class="font-bold text-lg" for="first_name">Nombre</label><br>
                    <input class="bg-white px-4 py-1 border-2 border-black border-solid roboto text-lg rounded" type="text" name="first_name" value="{{ old('first_name') }}"   autofocus>
                </div>
                <div class="block text-center">
                    @error('first_name')
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="block text-center pb-2">
                    <label class="font-bold text-lg" for="last_name">Apellido</label><br>
                    <input class="bg-white px-4 py-1 border-2 border-black border-solid roboto text-lg rounded" type="text" name="last_name" value="{{ old('last_name') }}" >
                </div>
                <div class="block text-center">
                    @error('last_name')
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="block text-center pb-2">
                    <label class="font-bold text-lg" for="image">Foto de Perfil (Opcional)</label><br>
                    <input type="file" name="image" accept="image/*" class="bg-white px-4 py-1 border-2 border-black border-solid roboto text-lg rounded w-64">
                </div>
                <div class="block text-center">
                    @error('image')
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="text-center mt-2">
                    <button class="hover:bg-red-800 hover:text-white hover:font-normal p-2 
                                    border-2 border-red-800 border-solid rounded 
                                    bg-white text-red-800 font-bold">
                                Completar Registro
                    </button>
                </div>
                
            </form>
            <br>
        </div>
    </div>
</body>
</html>