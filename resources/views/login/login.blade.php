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
            <form class="bg-gray-900 p-4 rounded" action="" method="POST">
                @csrf
                <div class="flex justify-center pb-2">
                    <img src="img/logo/TechNewsLogo.png" alt="Logo TecNews" width="100px" height="43px">
                </div>
                <div class="text-center pb-2">
                    <label class="text-white" for="username">Usuario:</label><br>
                    <input class="bg-white px-4 py-1 border-2 border-black border-solid rounded" type="text" name="username" autofocus>
                </div>
                <div class="text-center">
                    <label class="text-white" for="password">Contraseña:</label><br>
                    <input class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold" type="password" name="password">
                </div>    
                <div class="text-center mt-2">
                    <button class="
                                bg-white p-1 
                                font-bold  
                                border-2 border-black border-solid rounded 
                                hover:bg-red-800 hover:text-black">
                                Ingresar
                    </button>
                </div>
                
            </form>
            <br>
        <a href="{{ route('/') }}" class="text-white hover:text-red-800 underline">← Regresar</a>
        </div>
    </div>
</body>
</html>