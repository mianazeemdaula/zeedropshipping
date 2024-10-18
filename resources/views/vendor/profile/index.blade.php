@extends('layouts.admin')

@section('content')
    <section class="mx-auto w-full max-w-7xl px-4 py-4">
        <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
            <div class="flex items-center justify-between min-w-full">
                <h2 class="text-lg font-semibold">Profile</h2>
                @if ($user->status == 'active')
                    <a href="{{ route('vendor.profile.edit', $user->id) }}"
                        class="px-5 text-white bg-black py-2 rounded-lg hover:bg-gray-800">Edit</a>
                @endif
            </div>
        </div>
        <div class="mt-6 flex flex-col space-y-4 bg-white p-6 rounded-lg">
            <div class="p-4 border rounded-lg flex items-center space-x-2">
                <div class="w-20 h-20">
                    <img src="{{ $user->avatar }}" alt="" class="w-20 h-20 object-contain">
                </div>
                <div class="space-y-1">
                    <h3 class="text-sm font-semibold">{{ $user->name }}</h3>
                    <p class="text-sm">{{ $user->email }}</p>
                    <p class="text-sm">{{ $user->mobile }}</p>
                    <p class="text-sm">{{ $user->vendor->ds_number ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="p-4 border rounded-lg">
                <h1 class="text-base font-bold mb-4">Shop Information</h1>
                <table class="w-full table-fixed">
                    <tr class="">
                        <td class="text-sm w-1/2">Store Logo</td>
                        <td class="text-sm w-1/2">CNIC</td>
                    </tr>

                    <tr>
                        <td class="text-sm font-semibold w-1/2">
                            <img src="{{ $user->vendor->store_logo }}" alt="" class="w-20">
                        </td>
                        <td class="text-sm font-semibold w-1/2">
                            @if ($user->dropShipperNicKyc)
                                <img src="{{ asset($user->dropShipperNicKyc->file) }}" alt="" class="w-20">
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>

                    <tr class="">
                        <td class="text-sm pt-2 w-1/2">Name</td>
                        <td class="text-sm pt-2 w-1/2">Email</td>
                    </tr>

                    <tr>
                        <td class="text-sm font-semibold w-1/2">{{ $user->vendor->business_name }}</td>
                        <td class="text-sm font-semibold w-1/2">{{ $user->vendor->store_url }}</td>
                    </tr>
                    <tr>
                        <td class="text-sm pt-2 w-1/2">Phone</td>
                        <td class="text-sm pt-2 w-1/2">Status</td>
                    </tr>
                    <tr>
                        <td class="text-sm font-semibold w-1/2">{{ $user->vendor->phone }}</td>
                        <td class="text-sm w-1/2">
                            <div>
                                <x-status-chip status="{{ $user->status }}" />
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="p-4 border rounded-lg">
                <h1 class="text-base font-bold mb-4">Address Information</h1>
                <table class="w-full table-fixed">
                    <tr class="">
                        <td class="text-sm w-1/2">Country</td>
                        <td class="text-sm w-1/2">City</td>
                    </tr>
                    <tr>
                        <td class="text-sm font-semibold w-1/2">{{ $user->country->name }}</td>
                        <td class="text-sm font-semibold w-1/2">{{ $user->vendor->city_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-sm pt-2 w-1/2">Phone</td>
                        <td class="text-sm pt-2 w-1/2">Address</td>
                    </tr>
                    <tr>
                        <td class="text-sm font-semibold w-1/2">{{ $user->vendor->phone }}</td>
                        <td class="text-sm font-semibold w-1/2">{{ $user->vendor->address }}</td>
                    </tr>
                </table>
            </div>

            <div class="p-4 border rounded-lg">
                <h1 class="text-base font-bold mb-4">Bank Information</h1>
                <table class="w-full table-fixed">
                    <tr class="">
                        <td class="text-sm w-1/2">Bank</td>
                        <td class="text-sm w-1/2">IBAN</td>
                    </tr>
                    <tr>
                        <td class="text-sm font-semibold w-1/2">{{ $user->activeBankAccount->bank->name ?? 'N/A' }}</td>
                        <td class="text-sm font-semibold w-1/2">{{ $user->activeBankAccount->iban }}</td>
                    </tr>
                    <tr>
                        <td class="text-sm pt-2 w-1/2">Title</td>
                        <td class="text-sm pt-2 w-1/2"></td>
                    </tr>
                    <tr>
                        <td class="text-sm font-semibold w-1/2">{{ $user->activeBankAccount->account_name }}</td>
                        <td class="text-sm font-semibold w-1/2"></td>
                    </tr>
                </table>
            </div>
        </div>

    </section>
@endsection
