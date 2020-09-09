@extends('layouts.dashboard.profileDashboard')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="block">
            <div class="flex justify-center mb-4 w-full">
                <h2 class="font-bold text-white text-2xl mr-2">Perfil</h2>
            </div>
            @if (!is_null($users->image))
                <div class="flex justify-center mb-4">
                    <div class="w-24">
                        <img src="{{ asset("storage/users-profilePicture/{$users->image}")}}" alt="" class="rounded-full">
                    </div>
                </div>
            @endif
            <div class="flex mb-4 w-full">
                <span class="font-bold text-white mr-2">Nombre de Usuario:</span>
                    <p class="text-white"> {{ $users->user_name }} </p>
            </div>

            <div class="flex mb-4 w-full">
                <span class="font-bold text-white mr-2">Nombre:</span>
                    <p class="text-white"> {{ $users->first_name }} </p>
            </div>

            <div class="flex mb-4 ">
                <span class="font-bold text-white mr-2">Apellido:</span>
                    <p class="text-white"> {{ $users->last_name }} </p>
            </div>

            <div class="flex mb-4">
                   <span class="font-bold text-white mr-2">Correo:</span>
                       <p class="text-white"> {{ $users->email }} </p>
            </div>

            <div class="flex mb-4">
                <span class="font-bold text-white mr-2">Edad:</span>
                    <p class="text-white"> {{ $users->age }} </p>
            </div>

                        
            <div class="flex justify-center mt-8">
                @include('partials.ui.blueLinkButton', ['label' => 'Actualizar Perfil', 'url' => route('profile.edit', auth()->user()->id)])
            </div>
            <div class="flex justify-center mt-4">
                <form action="{{ route('logout') }}" method="POST" class="mb-4">
                    @csrf
                    @include('partials.ui.redButton', ['label' => 'Cerrar Sesión'])
                </form>
            </div>
        </div>
    </div>
    
@endsection