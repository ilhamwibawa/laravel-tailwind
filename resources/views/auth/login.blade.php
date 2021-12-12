@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
          <div>
            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
              Sign in to your account
            </h2>
          </div>
          <form class="mt-8 space-y-4" method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="remember" value="true">
            <x-forms.input
              name="email"
              label="Email Address"
              :isRequired="true"
              id="email"
              type="email"
            />
            <x-forms.input
              name="password"
              label="Password"
              :isRequired="true"
              id="password"
              type="password"
            />


            <div class="flex items-center justify-between">
              <x-forms.box
                id="remember"
                name="remember"
                type="checkbox"
                label="Remember me"
              />

              <div class="text-sm">
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                  Forgot your password?
                </a>
              </div>
            </div>

            <x-forms.button type="submit" label="Sign in" class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 py-2 px-4" />
          </form>
        </div>
      </div>
</main>
@endsection
