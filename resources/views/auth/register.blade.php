@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
  <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Create new account
        </h2>
      </div>
      <form class="mt-8 space-y-4" method="POST" action="{{ route('register') }}">
        @csrf
        <x-forms.input
          name="name"
          type="text"
          label="Full Name"
          :isRequired="true"
          id="name"
          hintText="Nama sesuai dengan KTP"
        />
        <x-forms.input
          name="email"
          type="email"
          label="Email Address"
          :isRequired="true"
          id="email"
        />
        <x-forms.input
          name="password"
          type="password"
          label="Password"
          :isRequired="true"
          id="password"
        />
        <x-forms.input
          name="password_confirmation"
          type="password"
          label="Password Confirmation"
          :isRequired="true"
          id="password_confirmation"
        />

        <x-forms.button type="submit" class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 py-2 px-4" label="Register" />
      </form>
    </div>
  </div>
</main>
@endsection
