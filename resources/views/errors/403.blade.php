{{-- @extends('errors::minimal')

@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}

@extends('layouts.guest')

@section('title', __('Forbidden'))
@section('content')
    <main class="grid h-screen  place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            <img src={{ asset('assets/images/Logo.png') }} alt="Zeedropshipping" class="mx-auto mb-8 h-48 w-auto" />

            {{-- <p class="mt-2 text-base  tracking-tight text-gray-900 sm:text-2xl">
                Stop right there!
            </p> --}}
            <p class="mt-2 text-base leading-7 text-gray-600">
                {{ $exception->getMessage() ?: 'Forbidden' }}
            </p>
            <div class="mt-4 flex flex-col items-center gap-y-6">
                <a href="{{ url('/') }}" class="text-sm font-light text-blue-800 hover:underline">
                    HOME
                </a>
            </div>
        </div>

        <div class="flex items-center space-x-4 my-3">
            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer"
                class="text-blue-600 hover:text-blue-800">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"
                class="text-pink-600 hover:text-pink-800">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://twitter.com" target="_blank" rel="noopener noreferrer"
                class="text-blue-400 hover:text-blue-600">
                <i class="fa-brands fa-twitter"></i>
            </a>

            <div class="w-full flex justify-center">
                <form action="" method="POST"
                    class="flex items-center w-full max-w-md bg-white border rounded-lg shadow-md">
                    <input type="email" placeholder="Enter your email"
                        class="flex-grow px-4 py-2 text-sm placeholder:text-gray-600 border-r border-gray-300 outline-none rounded-l-lg" />
                    <button type="submit"
                        class="bg-black text-white px-4 py-2 rounded-r-lg font-medium text-sm hover:bg-gray-800">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
