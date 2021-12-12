@extends('layouts.dashboard')
@section('page_title', 'Create User')
@section('content')
    <form action="{{ route('users.store') }}" class=" space-y-6" method="POST" enctype="multipart/form-data">
        @include('users._form')
        <x-forms.button type="submit" class="bg-indigo-500 hover:bg-indigo-600 py-2 px-4" label="Create User" />
    </form>
@endsection
