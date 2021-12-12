@extends('layouts.dashboard')
@section('page_title', 'Role & Permission Management')
@section('content')

    @can('add_roles')
        <div class="text-right mb-4">
            <x-forms.button type="button" data-action="modal" data-target="#roleModal" label="Create Role" class="bg-indigo-600 hover:bg-indigo-700 py-2 px-4" />
        </div>
    @endcan

    @forelse ($roles as $role)
        <form method="POST" action="{{ route('roles.update', $role) }}">
            @csrf
            @method('PUT')

            @if ($role->name === 'admin')
                @include('roles.shared._permissions', [
                    'title' => $role->name . ' Permissions',
                    'disabled' => 'true'
                ])
            @else
                @include('roles.shared._permissions', [
                    'title' => $role->name . ' Permissions',
                    'model' => $role,
                    'disabled' => 'false'
                ])
                @can('edit_roles')
                    <x-forms.button type="submit" label="Save" class="bg-indigo-600 hover:bg-indigo-700 py-2 px-4" />
                @endcan
            @endif
        </form>
    @empty
        <p>No roles defined, please run <code>php artisan starter:seed</code> to seed some data</p>
    @endforelse

    <x-modal id="roleModal" title="Add New Role">
        <form method="POST">
            @csrf
            <x-forms.input type="text" name="name" label="Role Name" required="true" class="mb-3" />
            <div class="flex items-center justify-end">
                <x-forms.button type="button" data-action="modal" data-target="#roleModal" label="Cancel" class="bg-gray-200 hover:bg-gray-300 text-gray-800 mr-2" />
                <x-forms.button type="submit" label="Add Role" class="bg-indigo-500 hover:bg-indigo-600 w-full" />
            </div>
        </form>
    </x-modal>
@endsection
