@extends('layouts.admin')

@section('content')
    <div class="mx-auto">
        <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
            <div class="min-w-full">
                <h2 class="text-lg font-semibold">Update Profile</h2>
                <p class="text-sm font-light text-gray-400">Update your profile and Business Informatoin</p>
            </div>
        </div>
        <div class="px-4 sm:px-8 md:px-12 bg-white rounded-lg mt-7 pt-4">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-sm relative" role="alert">
                    <strong class="font-bold">Holy smokes!</strong>
                    <span class="block sm:inline">Something seriously bad happened.</span>
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('vendor.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                    <div class="flex flex-col gap-2">
                        <x-label>User Name</x-label>
                        <x-input name="name" value="{{ $user->name }}" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Business Name</x-label>
                        <x-input name="business_name" value="{{ $user->vendor->business_name }}" />
                    </div>

                    <div class="flex flex-col gap-2">
                        <x-label>Store Url</x-label>
                        <x-input type="url" name="store_url" value="{{ $user->vendor->store_url }}" />
                    </div>

                    <div class="flex flex-col gap-2">
                        <x-label>Store Phone</x-label>
                        <x-input type="tel" name="phone" value="{{ $user->vendor->phone }}" />
                    </div>


                    <div class="flex flex-col gap-2">
                        <x-label>Store City</x-label>
                        <x-input name="city_name" value="{{ $user->vendor->city_name }}" />
                    </div>

                    <div class="flex flex-col gap-2">
                        <x-label>Store Address</x-label>
                        <x-input name="address" value="{{ $user->vendor->address }}" />
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 mt-4">
                    <div class="flex flex-col gap-2">
                        <div class="w-20 h-20">
                            <img src="{{ $user->avatar }}" alt="" srcset="" class="h-20">
                        </div>
                        <x-label>Avatar</x-label>
                        <x-input type="file" name="avatar" />
                    </div>

                    <div class="flex flex-col gap-2">
                        <div class="w-20 h-20">
                            <img src="{{ $user->vendor->store_logo }}" alt="" srcset="" class="h-20">
                        </div>
                        <x-label>Store Logo</x-label>
                        <x-input type="file" name="store_logo" />
                    </div>

                    <div class="flex flex-col gap-2">
                        <div class="w-20 h-20">
                            @if ($user->dropShipperNicKyc)
                                <img src="{{ asset($user->dropShipperNicKyc->file) }}" alt="" srcset=""
                                    class="h-20">
                            @else
                                <img src="{{ asset('users/default.png') }}" alt="" srcset="">
                            @endif
                        </div>
                        <x-label>CNIC (For payment verification)</x-label>
                        <x-input type="file" name="cnic" />
                    </div>
                </div>
                <div class="font-semibold mt-6 mb-2">Bank Information</div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                    <div class="flex flex-col gap-2">
                        <x-label>Bank Name</x-label>
                        <x-select name="bank_id">
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->id }}" @if ($user->activeBankAccount->bank_id == $bank->id) selected @endif>
                                    {{ $bank->name }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Account Name</x-label>
                        <x-input name="account_name" value="{{ $user->activeBankAccount->account_name }}" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Account Number (IBAN)</x-label>
                        <x-input name="iban" value="{{ $user->activeBankAccount->iban }}" />
                    </div>
                </div>

                <div class="flex py-6 space-x-4">
                    <button type="submit"
                        class="font-poppins py-2 px-4 rounded-md bg-green-500 text-white hover:bg-green-600 cursor-pointer">Update</button>
                    <button type="submit"
                        class="font-poppins py-2 px-4 rounded-md bg-red-500 text-white hover:bg-green-600 cursor-pointer">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
