@extends('layouts.dashboard')
@section('page_title', 'Users')
@section('content')

    @can('add_users')
        <div class="text-right mb-4">
            <x-forms.button type="link" href="{{route('users.create')}}" label="Create User" class="bg-indigo-600 hover:bg-indigo-700 py-2 px-4" />
        </div>
    @endcan

    <div class="overflow-x-scroll w-full">
        {!! $dataTable->table(['class' => '']) !!}
    </div>
@endsection
@push('scripts')
{!! $dataTable->scripts() !!}
@endpush
