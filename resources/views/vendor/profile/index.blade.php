@extends('layouts.admin')

@section('content')
<section class="mx-auto w-full h-screen max-w-7xl px-4 py-4">
    <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
        <div class="flex items-center justify-between min-w-full">
            <h2 class="text-lg font-semibold">Profile</h2>
            <a href="{{ route('vendor.profile.edit', $user->id) }}" class="px-5 text-white bg-black py-2 rounded-lg hover:bg-gray-800" >Edit</a>
        </div>
    </div>
    <div class="mt-6 flex flex-col space-y-4 bg-white p-6 rounded-lg">
        <div class="p-4 border rounded-lg flex items-center space-x-2">
            <div class="w-20">
                <img src="{{ $user->avatar }}" alt="" class="w-full">
            </div>
            <div class="space-y-1">
                <h3 class="text-sm font-semibold">{{ $user->name }}</h3>
                <p class="text-sm">{{ $user->email }}</p>
                <p class="text-sm">{{ $user->mobile }}</p>
            </div>
        </div>

        <div class="p-4 border rounded-lg">
            <h1 class="text-base font-bold mb-4">Shop Information</h1>
            <div class="w-20 mb-4">
                <img src="{{ $user->vendor->store_logo }}" alt="" class="w-full">
            </div>
            <table class="w-full">
                <tr class="">
                    <td class="text-sm ">Name</td>
                    <td class="text-sm">Email</td>
                </tr>
                <tr>
                    <td class="text-sm font-semibold">{{ $user->vendor->business_name }}</td>
                    <td class="text-sm font-semibold">{{ $user->vendor->store_url }}</td>
                </tr>
                <tr>
                    <td class="text-sm pt-2">Phone</td>
                    <td class="text-sm pt-2">Status</td>
                </tr>
                <tr>
                    <td class="text-sm font-semibold">{{ $user->vendor->phone }}</td>
                    <td class="text-sm ">
                        <div>
                            <span class="bg-green-500 text-white px-4 py-1 rounded-full">Active</span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="p-4 border rounded-lg">
            <h1 class="text-base font-bold mb-4">Address Information</h1>
            <table class="w-full">
                <tr class="">
                    <td class="text-sm ">Country</td>
                    <td class="text-sm">City</td>
                </tr>
                <tr>
                    <td class="text-sm font-semibold">{{ $user->country->name }}</td>
                    <td class="text-sm font-semibold">{{ $user->vendor->city->name }}</td>
                </tr>
                <tr>
                    <td class="text-sm pt-2">Phone</td>
                    <td class="text-sm pt-2">Address</td>
                </tr>
                <tr>
                    <td class="text-sm font-semibold">{{ $user->vendor->phone }}</td>
                    <td class="text-sm font-semibold">{{ $user->vendor->address }}</td>
                </tr>
            </table>
        </div>
    </div>

</section>
@endsection
