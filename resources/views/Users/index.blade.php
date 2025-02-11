@extends('template')
@section('content')

<x-redirect-button url="{{route('users.create')}}" class="mb-2"  text="Agregar nuevo Usuario"/>
<div
    class="table-responsive"
>
    <table
        class="table table-primary"
    >
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Celular</th>
                <th scope="col">Carnet</th>
                <th scope="col">Genero</th>
                <th scope="col">Correo</th>
                <th scope="col">Tipo de Rol</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
            
            <tr class="">
                <td scope="row">{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->cellphone}}</td>
                <td>{{$user->identity_number}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->email}}</td>

                <td>{{$user->role->name}}</td>
                <td>
                    <x-edit-button
                        class=""
                        :route="'roles.edit'"
                        text="Editar"
                        :id="$user->id"
                        :type="'button'"
                        />
                    <x-danger-button
                        x-data=""
                        x-on:click="$dispatch('open-modal','confirm-role-deletion-{{$user->id}}')">
                        Eliminar
                    </x-danger-button>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@foreach ($users as $user)
<x-modal name="confirm-role-deletion-{{ $user->id }}" maxWidth="2xl">
    <div class="p-6">
        <h2 class="text-lg font-semibold mb-4">¿Estás seguro de que deseas eliminar al usuario {{$user->name}}?</h2>
        <p class="text-gray-600 dark:text-gray-400 mb-6">
            Esta acción es irreversible. Todos los permisos asociados a este usuario se perderán.
        </p>
        <div class="flex justify-end space-x-4">
            <!-- Botón para cancelar -->
            <x-secondary-button x-on:click="$dispatch('close-modal', 'confirm-role-deletion-{{ $user->id }}')">
                Cancelar
            </x-secondary-button>
            <!-- Formulario para eliminar el rol -->
            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                @csrf
                @method('DELETE')
                <x-danger-button type="submit">
                    Eliminar Uusuario
                </x-danger-button>
            </form>
        </div>
    </div>
</x-modal>
@endforeach

@endsection