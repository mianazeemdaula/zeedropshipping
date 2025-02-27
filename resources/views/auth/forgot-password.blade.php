@extends('layouts.guest')
@section('title', 'Forgot Password')
@section('content')
    <div class="bg-gray-100 h-screen flex items-center justify-center">
        <div class="">
            <div class="flex justify-center">
                <img src="{{ asset('assets/images/Logo.png') }}" alt="" srcset="" class="h-16">
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-sm relative mb-2"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <div class="bg-white mt-4 p-8 rounded-lg">
                <div class="flex flex-col ">
                    <div class="text-lg font-medium">Forget Password ?</div>
                    <div class="text-sm text-gray-500">Enter your email to reset your password</div>
                    <div class="my-2">
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success" role="alert">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <div class="mt-1 flex justify-center items-center">
                            <form class="min-w-80" method="POST" action="{{ route('password.request') }}">
                                @csrf
                                <div class="grid grid-cols-1 gap-3 my-4">
                                    <div>
                                        <x-label>Email</x-label>
                                        <x-input name="email" type="email" placeholder="Email" />
                                    </div>
                                </div>

                                <button type="submit"
                                    class="px-4 py-2 bg-primary-500 text-white rounded-xl hover:bg-primary-200">Reset
                                    Password
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
