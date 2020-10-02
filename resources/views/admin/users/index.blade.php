@extends('layouts.dashboard.adminDashboard')

@section('title','Usuarios')
@section('h1','Usuarios:')


@section('content')
    <div class="flex justify-center mt-8">
        @include('partials.ui.linkButton', ['label' => 'Crear Usuario', 'url' => route('admin.users.create')])
    </div>
    <div class="flex justify-center my-4">
        <div class="block">
            <form action="{{ route('admin.users.index') }}" method="GET">
                <div class="flex items-center w-full my-2">
                    <h2 class="text-xl font-bold mr-2">Buscar: </h2>
                    <input type="text" name="keyword" class="bg-white px-4 py-1 mr-2 border-2 border-black border-solid rounded font-bold w-full"
                            value="{{ request()->keyword }}">
                    @include('partials.ui.blueButton', ['label' => 'Buscar'])
                </div>

            </form>
            
        </div>
    </div>
    @if (count($users) == 0)
    <div class="flex justify-center mt-8">
            <div class="block">
                <div class="flex justify-center">
                    <img class="block w-12 text-center" src="{{ asset('img/icons/alert.svg') }}" alt="Alert!">
                </div>
                <p class="block text-lg">¡No se encontraron resultados!</p>
            </div>
        </div>
    @else
        @if (!is_null(request()->keyword))
            <div class="flex justify-center mt-2">
                <a href="{{ route('admin.users.index') }}" 
                    class="font-bold text-blue-800 hover:text-red-800 underline">← Limpiar busqueda</a>
            </div>
            <div class="flex justify-center mt-2">
                <span class="font-bold">Cantidad de resultados: {{$users->total() }}</span>
            </div>                
        @endif
<div class="mt-4 mr-4">
    <table class="table-auto w-full">
        <thead class="text-xl">
            <th class="text-left roboto">Usarname</th>
            <th class="text-left roboto">Correo</th>
            <th class="text-left roboto">Nombre</th>
            <th class="text-left roboto">Apellido</th>
            <th class="text-left roboto">Edad</th>
            <th class="text-left roboto">Rol</th>
            <th class="text-left roboto">Activo</th>
            <th class="text-left roboto">Acción</th>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-t">
                <td class="flex items-center py-1 roboto">
                    <img 
                        @if (!is_null($user->image))
                            src="{{ asset("storage/users-profilePicture/{$user->image}")}}"
                        @else
                            src="{{ asset('img/logo/TechNewsLogo-Brujula.png') }}"
                        @endif
                    alt="Tech News Logo" class="w-10 h-10 object-cover rounded-full mr-2">
                    {{ $user->user_name }}
                </td>
                <td class="py-1 roboto">
                    {{ $user->email}}
                </td>
                <td class="py-1 roboto">
                    {{ $user->first_name}}
                </td>
                <td class="py-1 roboto">
                    {{ $user->last_name}}
                </td>
                <td class="py-1 roboto">
                    {{ $user->age}}
                </td>
                <td class="py-1 roboto">
                    {{ $user->role->name}}
                </td>
                <td class="py-1 roboto">
                    {{ is_null($user->deleted_at) ? 'Sí' : 'No' }}
                </td>
                <td class="py-1 roboto">
                    @if (!(auth()->id()==$user->id))
                        @include('partials.ui.blueLinkButton', ['label' => 'Editar', 'url' => route('admin.users.edit', $user->id)])
                    @else 
                    <span class="bg-blue-800 text-white bg-opacity-75 text-lg text-opacity-75 p-2 mb-4 rounded">Editar
                    </span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    @endif
    <div class="flex justify-center my-8">
        <div class="block">
            <div class="flex mt-1 font-bold text-lg">
                @if ($users->hasPages())
                    <span class="mx-2">
                        @if (!$users->onFirstPage())
                            <a href="{{ $users->previousPageUrl() }}" class="hover:text-red-800 underline" >←</a>
                        @else
                            ←
                        @endif
                    </span>
                    <span class="mx-2">Página {{ $users->currentPage() }}/{{$users->lastPage()}}</span>
                    <span class="mx-2">
                        @if ($users->hasMorePages())
                            <a href="{{ $users->nextPageUrl() }}" class="hover:text-red-800 underline">→</a>
                        @else
                            →
                        @endif
                    </span>
                @endif
            </div>
        </div>
    </div>
@endsection