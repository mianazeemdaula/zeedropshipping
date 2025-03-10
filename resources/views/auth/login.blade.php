@extends('layouts.guest')
@section('content')
    <section class="">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="flex items-center justify-center px-4 py-10 sm:px-6 sm:py-16 lg:px-8 lg:py-24">
                <div class="xl:mx-auto xl:w-full xl:max-w-sm 2xl:max-w-md">
                    <h2 class="text-3xl font-bold leading-tight text-primary-500 sm:text-4xl">
                        Sign in
                    </h2>
                    <p class="mt-2 text-base text-gray-600">
                        Don't have an account?
                        <a href="{{ url('signup') }}" title=""
                            class="font-medium text-black transition-all duration-200 hover:underline">
                            Register Now
                        </a>
                    </p>
                    <form action="{{ url('login') }}" method="POST" class="mt-8">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <x-label>Email</x-label>
                                <div class="mt-2">
                                    <x-input name="email" type="email" placeholder="Email" />
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between">
                                    <x-label>Password</x-label>
                                    <a href="{{ route('password.request') }}" title=""
                                        class="text-sm font-medium text-black transition-all duration-200 hover:underline">
                                        Forgot Password?
                                    </a>
                                </div>
                                <div class="mt-2" x-data="{ showpassword: false }">
                                    <div class="relative">
                                        <input :type="showpassword ? 'text' : 'password'" name="password"
                                            placeholder="Password"
                                            class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-hidden focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50">
                                        <!-- Eye Icon -->
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <i x-show="showpassword" class="fa-solid fa-eye"
                                                x-on:click="showpassword = ! showpassword"></i>
                                            <i x-show="!showpassword" class="fa-solid fa-eye-slash"
                                                x-on:click="showpassword = ! showpassword"></i>
                                        </div>
                                    </div>
                                    @error('password')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <x-primary-button type="submit">Signin</x-primary-button>
                            </div>
                        </div>
                    </form>
                    {{-- <div class="mt-3 space-y-3">
          <button
            type="button"
            class="relative inline-flex w-full items-center justify-center rounded-md border border-gray-400 bg-white px-3.5 py-2.5 font-semibold text-gray-700 transition-all duration-200 hover:bg-gray-100 hover:text-black focus:bg-gray-100 focus:text-black focus:outline-hidden"
          >
            <span class="mr-2 inline-block">
              <svg
                class="h-6 w-6 text-rose-500"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
              >
                <path d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z"></path>
              </svg>
            </span>
            Sign up with Google
          </button>
          <button
            type="button"
            class="relative inline-flex w-full items-center justify-center rounded-md border border-gray-400 bg-white px-3.5 py-2.5 font-semibold text-gray-700 transition-all duration-200 hover:bg-gray-100 hover:text-black focus:bg-gray-100 focus:text-black focus:outline-hidden"
          >
            <span class="mr-2 inline-block">
              <svg
                class="h-6 w-6 text-[#2563EB]"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
              >
                <path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z"></path>
              </svg>
            </span>
            Sign up with Facebook
          </button>
        </div> --}}
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
