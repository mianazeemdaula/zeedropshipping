@extends('layouts.admin')
@section('content')
<section class="">
  <div class="flex items-center justify-center px-4 py-4 sm:px-4 sm:py-4 lg:px-4 lg:py-4">
      <div class="xl:mx-auto xl:w-full xl:max-w-sm 2xl:max-w-md">
        <h2 class="font-bold leading-tight text-primary-500">
          Change Password
        </h2>
        <form action="{{ route('change.password') }}" method="POST" class="mt-8">
          @csrf
          <div class="space-y-5">
            <div>
              <x-label>Old Password</x-label>
              <div class="mt-2" x-data="{ showpassword: false }">
                <div class="relative" >
                  <input :type="showpassword ? 'text' : 'password'" name="old_password" placeholder="Old Password" class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-hidden focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50">
                  <!-- Eye Icon -->
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <i x-show="showpassword" class="fa-solid fa-eye" x-on:click="showpassword = ! showpassword"></i>
                    <i x-show="!showpassword" class="fa-solid fa-eye-slash" x-on:click="showpassword = ! showpassword"></i>
                  </div>
                  @error('old_password')
                      <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                  @enderror
                </div>
              </div>
            </div>
            <div>
              <div class="flex items-center justify-between">
                <x-label>New Password</x-label>
              </div>
              <div class="mt-2" x-data="{ showpassword: false }">
                <div class="relative" >
                  <input :type="showpassword ? 'text' : 'password'" name="password" placeholder="Password" class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-hidden focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50">
                  <!-- Eye Icon -->
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <i x-show="showpassword" class="fa-solid fa-eye" x-on:click="showpassword = ! showpassword"></i>
                    <i x-show="!showpassword" class="fa-solid fa-eye-slash" x-on:click="showpassword = ! showpassword"></i>
                  </div>
                  @error('password')
                      <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                  @enderror
                </div>
              </div>
            </div>

            <div>
              <div class="flex items-center justify-between">
                <x-label>Confirm Password</x-label>
              </div>
              <div class="mt-2" x-data="{ showpassword: false }">
                <div class="relative" >
                  <input :type="showpassword ? 'text' : 'password'" name="password_confirmation" placeholder="Confirm Password" class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-hidden focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50">
                  <!-- Eye Icon -->
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <i x-show="showpassword" class="fa-solid fa-eye" x-on:click="showpassword = ! showpassword"></i>
                    <i x-show="!showpassword" class="fa-solid fa-eye-slash" x-on:click="showpassword = ! showpassword"></i>
                  </div>
                  @error('password_confirmation')
                      <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                  @enderror
                </div>
              </div>
            <div class="mt-4">
              <x-primary-button type="submit">Signin</x-primary-button>
            </div>
          </div>
        </form>
      </div>
    </div>
</section>
@endsection