<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - TECH NEWS</title>
    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('img/logo/TechNewsLogo-Brujula.png')}}" type="image/png">
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body class="bg-black">
    <div class="flex justify-center h-screen">
        <div class="flex flex-col justify-center items-center w-full">
        <form class="bg-gray-900 p-4 rounded" action="{{ route('password.email') }}" method="POST">
                @csrf

                <div class="flex justify-center mb-2">
                    <img src="{{ asset('img/logo/TechNewsLogo.png')}}" alt="Logo TecNews" width="100px" height="43px" class="p-1 bg-white rounded">
                </div>
                <div class="flex justify-center mb-4">
                    <span class="text-white">Resetear Contraseña</span>
                </div>
                @if (session('status'))
                        <div class="flex justify-center mb-2 text-white underline">
                            {{ session('status') }}
                        </div>
                @endif
                <div class="text-center pb-2">
                    <label class="text-white" for="email">Correo:</label><br>
                    <input class="bg-white px-4 py-1 border-2 border-black border-solid rounded" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <div class="text-center">
                    @error('email')
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                
                  
                <div class="text-center mt-4">
                    <button class="bg-red-800 text-white p-2 
                                border-2 border-black border-solid rounded 
                                hover:bg-white hover:text-red-800 hover:font-bold">
                                Generar Link
                    </button>
                </div>

            </form>
            <br>
            <a href="{{ route('login')}}" 
                class="text-white hover:text-red-800 underline">← Regresar a login</a>
        </div>
    </div>
</body>
</html>