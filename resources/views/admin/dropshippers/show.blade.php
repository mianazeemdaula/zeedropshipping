@extends('layouts.admin')

@section('content')
    <section class="mx-auto w-full max-w-7xl px-4 py-4">
        <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
            <div class="flex items-center justify-between min-w-full">
                <h2 class="text-lg font-semibold">Profile</h2>
                <a href="{{ route('admin.users.edit', $user->id) }}"
                    class="px-5 text-white bg-black py-2 rounded-lg hover:bg-gray-800">Edit</a>
            </div>
        </div>
        <div class="mt-6 flex flex-col space-y-4 bg-white p-6 rounded-lg">
            <div class="p-4 border rounded-lg flex items-center space-x-2">
                <div class="size-40">
                    <img src="{{ $user->avatar }}" alt="" class="size-40 object-contain">
                </div>
                <div class="space-y-0">
                    <h3 class="text-sm font-semibold">{{ $user->name }}</h3>
                    <p class="text-sm">{{ $user->email }}</p>
                    <p class="text-sm">{{ $user->mobile ?? 'Mobile N/A' }}</p>
                    <p class="text-sm">{{ $user->vendor->ds_number ?? 'N/A' }}</p>
                    <p class="text-sm">Last Update: {{ $user->updated_at }}</p>
                </div>
            </div>

            @if ($user->hasRole('dropshipper') && $user->vendor)
                <div class="p-4 border rounded-lg">
                    <h1 class="text-base font-bold mb-4">Shop Information</h1>
                    <table class="w-full table-fixed">
                        <tbody>
                            <tr>
                                <td class="text-sm w-1/2">
                                    <img src="{{ $user->vendor->store_logo }}" alt="Store Logo" class="w-full rounded">
                                </td>
                                <td class="text-sm font-semibold w-1/2">
                                    @if ($user->dropShipperNicKyc)
                                        <img src="{{ asset($user->dropShipperNicKyc->file) }}" alt=""
                                            class="w-20">
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr class="">
                                <td class="text-sm w-1/2">Name</td>
                                <td class="text-sm w-1/2">Web</td>
                            </tr>
                            <tr>
                                <td class="text-sm font-semibold w-1/2">{{ $user->vendor->business_name }}</td>
                                <td class="text-sm font-semibold w-1/2">{{ $user->vendor->store_url }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm align-top pt-2">Phone</td>
                                <td class="text-sm align-top pt-2">Status</td>
                            </tr>
                            <tr>
                                <td class="text-sm font-semibold w-1/2">{{ $user->vendor->phone }}</td>
                                <td class="text-sm font-semibold w-1/2">
                                    <x-status-chip status="{{ $user->status }}" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="p-4 border rounded-lg">
                    <h1 class="text-base font-bold mb-4">Address Information</h1>
                    <table class="w-full table-fixed">
                        <tbody>
                            <tr>
                                <td class="text-sm  w-1/2">Country</td>
                                <td class="text-sm  w-1/2">City</td>
                            </tr>
                            <tr>
                                <td class="text-sm font-semibold w-1/2">{{ $user->country->name }}</td>
                                <td class="text-sm font-semibold w-1/2">{{ $user->vendor->city_name }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm  w-1/2 pt-2">Phone</td>
                                <td class="text-sm w-1/2 pt-2">Address</td>
                            </tr>
                            <tr>
                                <td class="text-sm font-semibold w-1/2 pt-2">{{ $user->vendor->phone }}</td>
                                <td class="text-sm font-semibold w-1/2 pt-2">{{ $user->vendor->address }}</td>
                            </tr>

                            <tr>
                                <td class="text-sm  w-1/2 pt-2">Sale Level</td>
                                <td class="text-sm w-1/2 pt-2">Last Sales</td>
                            </tr>
                            <tr>
                                <td class="text-sm font-semibold w-1/2 pt-2">{{ $user->vendor->sale_level }}</td>
                                <td class="text-sm font-semibold w-1/2 pt-2">{{ $user->vendor->last_sales }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border rounded-lg">
                    <h1 class="text-base font-bold mb-4">Bank Information</h1>
                    <table class="w-full table-fixed">
                        <tbody>
                            <tr>
                                <td class="text-sm w-1/2">Bank</td>
                                <td class="text-sm w-1/2">IBAN</td>
                            </tr>
                            <tr>
                                <td class="text-sm font-medium  w-1/2">
                                    {{ $user->activeBankAccount->bank->name ?? 'N/A' }}</td>
                                <td class="text-sm font-medium w-1/2 ml-10">{{ $user->activeBankAccount->iban }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm  w-1/2 pt-2">Title</td>
                                <td class="text-sm  w-1/2 pt-2"></td>
                            </tr>
                            <tr>
                                <td class="text-sm font-medium align-top w-1/2">
                                    {{ $user->activeBankAccount->account_name }}
                                </td>
                                <td class="text-sm font-medium align-top w-1/2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </section>
@endsection
