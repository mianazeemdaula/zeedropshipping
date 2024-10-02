@extends('layouts.guest')
@section('content')
    <section class="">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="flex items-center justify-center px-4 py-10 sm:px-6 sm:py-16 lg:px-8 ">
                <div class="xl:mx-auto xl:w-full">
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
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3">
                            <div>
                                <x-label>Full Name*</x-label>
                                <x-input name="name" placeholder="Full Name" value="{{ old('name') }}" />
                            </div>
                            <div>
                                <x-label>Email*</x-label>
                                <x-input name="email" type="email" placeholder="Email" value="{{ old('email') }}" />
                            </div>
                            <div>
                                <x-label>Business Name*</x-label>
                                <x-input name="business_name" placeholder="Busines Name"
                                    value="{{ old('business_name') }}" />
                            </div>

                            <div>
                                <x-label>Store Url*</x-label>
                                <x-input type="url" name="store_url" placeholder="https://shop.com"
                                    value="{{ old('store_url') }}" />
                            </div>

                            <div>
                                <x-label>WhatsApp Number*</x-label>
                                <x-input type="tel" placeholder="923001234567" name="phone"
                                    value="{{ old('phone') }}" />
                            </div>

                            <div>
                                <x-label>Store City*</x-label>
                                <x-input name="city_name" placeholder="Lahore" value="{{ old('city_name') }}" />
                            </div>

                            <div>
                                <x-label>Store Address*</x-label>
                                <x-input name="address" placeholder="Address" value="{{ old('address') }}" />
                            </div>

                            <div>
                                <x-label>CNIC* Front Side</x-label>
                                <x-input type="file" name="cnic" required="true" />
                            </div>
                            <div>
                                <x-label>Sales Experience*</x-label>
                                <x-select name="sale_level">
                                    <option value="experience">Experience</option>
                                    <option value="beginner">Beginner</option>
                                </x-select>
                            </div>
                            <div>
                                <x-label>Last 30 Days Sale*</x-label>
                                <x-input name="last_sales" type="number" placeholder="500000"
                                    value="{{ old('last_sales') }}" />
                            </div>
                            <div>
                                <x-label>Password*</x-label>
                                <x-input name="password" type="password" placeholder="Password" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                            <div class="flex flex-col gap-2">
                                <x-label>Bank Name</x-label>
                                <x-select name="bank_id">
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div class="flex flex-col gap-2">
                                <x-label>Account Name*</x-label>
                                <x-input name="account_name" value="{{ old('account_name') }}" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <x-label>Account Number (IBAN)*</x-label>
                                <x-input name="iban" value="{{ old('iban') }}" />
                            </div>
                        </div>

                        <div class="flex items-center justify-start gap-2 my-4">
                            <input type="checkbox" name="accept_terms" id="">
                            <p>I accept the <a href="{{ url('/terms-and-conditions') }}" class="text-primary-500">terms
                                    and conditions</a></p>
                        </div>
                        @error('accept_terms')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="mt-4">
                            <x-primary-button type="submit">Sign up</x-primary-button>
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
