@extends('template')
@section('content')

<x-redirect-button url="{{route('roles.create')}}" class="mb-2"  text="Agregar nuevo Rol"/>
<div
    class="table-responsive"
>
    <table
        class="table table-primary"
    >
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombres</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role )
            
            <tr class="">
                <td scope="row">{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>
                    <x-edit-button
                        class=""
                        :route="'roles.edit'"
                        text="Editar"
                        :id="$role->id"
                        :type="'button'"
                        />
                    <x-danger-button
                        x-data=""
                        x-on:click="$dispatch('open-modal','confirm-role-deletion-{{$role->id}}')">
                        Eliminar
                    </x-danger-button>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@foreach ($roles as $role)
<x-modal name="confirm-role-deletion-{{ $role->id }}" maxWidth="2xl">
    <div class="p-6">
        <h2 class="text-lg font-semibold mb-4">¿Estás seguro de que deseas eliminar el rol {{$role->name}}?</h2>
        <p class="text-gray-600 dark:text-gray-400 mb-6">
            Esta acción es irreversible. Todos los permisos asociados a este rol se perderán.
        </p>
        <div class="flex justify-end space-x-4">
            <!-- Botón para cancelar -->
            <x-secondary-button x-on:click="$dispatch('close-modal', 'confirm-role-deletion-{{ $role->id }}')">
                Cancelar
            </x-secondary-button>
            <!-- Formulario para eliminar el rol -->
            <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                @csrf
                @method('DELETE')
                <x-danger-button type="submit">
                    Eliminar rol
                </x-danger-button>
            </form>
        </div>
    </div>
</x-modal>
@endforeach

@endsection