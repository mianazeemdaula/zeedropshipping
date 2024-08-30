@extends('layouts.guest')
@section('content')
    <section class="">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="flex items-center justify-center px-4 py-10 sm:px-6 sm:py-16 lg:px-8 lg:py-24">
                <div class="xl:mx-auto xl:w-full xl:max-w-sm 2xl:max-w-md">
                    <h2 class="text-3xl font-bold leading-tight text-primary-500 sm:text-4xl">
                        Register Now
                    </h2>
                    <p class="mt-2 text-base text-gray-600">
                        Already have an account?
                        <a href="{{ url('login') }}" title=""
                            class="font-medium text-black transition-all duration-200 hover:underline">
                            Sign In
                        </a>
                    </p>
                    <form action="{{ url('signup') }}" method="POST" class="mt-8">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <x-label>Full Name</x-label>
                                <div class="mt-2">
                                    <x-input name="name" placeholder="Full Name" value="{{ old('name') }}" />
                                </div>
                            </div>
                            <div>
                                <x-label>Email</x-label>
                                <div class="mt-2">
                                    <x-input name="email" type="email" placeholder="Email"
                                        value="{{ old('email') }}" />
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between">
                                    <x-label>Password</x-label>
                                    <a href="#" title=""
                                        class="text-sm font-medium text-black transition-all duration-200 hover:underline">
                                        Forgot Password?
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <x-input name="password" type="password" placeholder="Password" />
                                </div>
                            </div>
                            <div class="flex items-center justify-start gap-2">
                                <input type="checkbox" name="accept_terms" id="">
                                <p>I accept the <a href="{{ url('/terms-and-conditions') }}" class="text-primary-500">terms
                                        and conditions</a></p>
                            </div>
                            @error('accept_terms')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <div>
                                <x-primary-button type="submit">Sign up</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class=" hidden h-screen  lg:flex">
                <img class="mx-auto h-full w-full rounded-md object-cover"
                    src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1742&amp;q=80"
                    alt="" />
            </div>
        </div>
    </section>
@endsection
