@extends('layouts.guest')

@section('content')
    <div class="bg-gray-100 h-screen flex items-center justify-center">
        <div class="">
            <div class="flex justify-center">
                <img src="{{ asset('assets/images/Logo.png') }}" alt="" srcset="" class="h-16">
            </div>
            <div class="bg-white mt-4 p-8 rounded-lg">
                <div class="flex flex-col items-center">
                    <div class="text-lg font-medium">{{ __('Verify Your Email Address') }}</div>
                    <div class="card-body">
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success" role="alert">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <div class="text-center mt-4">
                            @if (session('status') == 'verification-link-sent')
                                <div>
                                    {{ __('Before proceeding, please check your email for a verification link.') }}
                                    {{ __('If you did not receive the email') }},
                                </div>
                                <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit"
                                        class="text-primary-500">{{ __('click here to request another') }}</button>.
                                </form>
                            @else
                                <div class="text-center">
                                    {{ __('Before proceeding, please check your email for a verification link.') }}
                                    {{ __('If you did not receive the email') }},
                                </div>
                                <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit"
                                        class="text-primary-500 font-medium">{{ __('click here to request another') }}</button>.
                                </form>
                            @endif
                        </div>

                        <div class="mt-3 flex justify-center items-center">
                            <form class="d-inline" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-2 bg-primary-500 text-white rounded-xl hover:bg-primary-200">{{ __('Logout') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
