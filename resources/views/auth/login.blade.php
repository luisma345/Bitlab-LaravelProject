<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TECH NEWS</title>
    <!-- Icon -->
    <link rel="shortcut icon" href="img/logo/TechNewsLogo-Brujula.png" type="image/png">
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-black">
    <div class="flex justify-center h-screen">
        <div class="flex flex-col justify-center items-center w-full">
        <form class="bg-gray-900 p-4 rounded" action="{{ route('login') }}" method="POST">
                @csrf

                <div class="flex justify-center mb-2">
                    <img src="img/logo/TechNewsLogo.png" alt="Logo TecNews" width="100px" height="43px" class="p-1 bg-white rounded">
                </div>

                <div class="text-center pb-2">
                    <label class="text-white" for="email">Correo:</label><br>
                    <input class="bg-white px-4 py-1 border-2 border-black border-solid rounded" type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <div class="text-center">
                    @error('email')
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="text-center">
                    <label class="text-white" for="password">Contraseña:</label><br>
                    <input class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold" type="password" name="password" required autocomplete="current-password">
                </div>
                <div class="text-center">
                    @error('password')
                        <span class="text-red-800 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 

                <div class="text-center mt-2">
                    @if (Route::has('password.request'))
                        <a class="text-white rounded hover:text-red-800 underline text-sm" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                <div class="text-center mt-2">
                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="text-white" for="remember">
                        Recuerdame
                    </label>
                </div> 
                  
                <div class="text-center mt-2">
                    <button class="bg-red-800 text-white p-2 
                                border-2 border-black border-solid rounded 
                                hover:bg-white hover:text-red-800 hover:font-bold">
                                Ingresar
                    </button>
                </div>
                
                <div class="text-center mt-2">
                    <a class="text-white hover:text-red-800 underline text-sm" href="{{ route('register') }}">¿Sin cuenta? ¡Registrate!</a>
                </div>
                
            </form>
            <br>
            <a href="{{ route('/') }}" 
                class="text-white hover:text-red-800 underline">← Regresar a Inicio</a>
        </div>
    </div>
</body>
</html>