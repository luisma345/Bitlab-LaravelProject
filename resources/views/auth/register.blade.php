<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - TECH NEWS</title>
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
        <form class="rounded-lg border-blue-800 border-2 p-4 rounded" action="{{ route('register') }}" method="POST">
                @csrf

                <div class="flex justify-center mb-2">
                <img src="{{ asset('img/logo/TechNewsLogo.png') }}" alt="Logo TecNews" width="150px" class="p-1">
                </div>

                <div class="block text-center pb-2">
                    <label class="font-bold text-lg" for="user_name">{{ __('Usuario:') }}</label><br>
                    <input class="bg-white px-4 py-1 border-2 border-black border-solid roboto text-lg rounded" type="text" name="user_name" value="{{ old('user_name') }}" required  autofocus>
                </div>
                <div class="block text-center">
                    @error('user_name')
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="block text-center pb-2">
                    <label class="font-bold text-lg" for="email">Correo:</label><br>
                    <input class="bg-white px-4 py-1 border-2 border-black border-solid roboto text-lg rounded" type="text" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
                <div class="block text-center">
                    @error('email')
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="block text-center pb-2">
                    <label class="font-bold text-lg" for="password">Contraseña:</label><br>
                    <input class="bg-white px-4 py-1 border-2 border-black border-solid rounded roboto text-lg font-bold" type="password" name="password" required autocomplete="new-password">
                </div>
                <div class="block text-center">
                    <label class="font-bold text-lg" for="password">Confirmar Contraseña</label><br>
                    <input class="bg-white px-4 py-1 border-2 border-black border-solid rounded roboto text-lg font-bold" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="block text-center">
                    @error('password')
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
                <div class="block text-center">
                    <label class="font-bold text-lg" for="age">Edad:</label><br>
                    <input type="number" name="age" min="0" max="100" class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold" value="{{ old('age') }}" required autocomplete="age">
                </div>
                <div class="block text-center">
                    @error('age')
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
                <div class="text-center mt-2">
                    <button class="hover:bg-red-800 hover:text-white hover:font-normal p-2 
                                border-2 border-red-800 border-solid rounded 
                                bg-white text-red-800 font-bold">
                                Registrarse
                    </button>
                </div>
                <div class="text-center mt-2">
                    <a class="font-bold hover:text-red-800 underline text-sm" href="{{ route('login') }}">¿Tienes cuenta? Inicia Sesión</a>
                </div>
                
            </form>
            <br>
        <a href="{{ route('home') }}" class="font-bold hover:text-red-800 underline">← Regresar a Inicio</a>
        </div>
    </div>
</body>
</html>