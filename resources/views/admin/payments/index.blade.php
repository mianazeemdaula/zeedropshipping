@extends('layouts.admin')

@section('content')
    <section class="mx-auto w-full max-w-7xl px-4 py-4 min-h-screen">
        <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
            <div class="flex items-center justify-between min-w-full">
                <div>
                    <h2 class="text-lg font-semibold">Dropshipper Accounts</h2>
                </div>
                <a href="{{ route('admin.payments.create') }}"
                    class="px-5 text-white bg-black py-2 rounded-lg hover:bg-gray-800">Create</a>
            </div>
        </div>
        <div class="mt-6 flex flex-col space-y-4">
            <!-- Table Layout for Larger Screens -->
            <div class="">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Dropshipper</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Orders without payment</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Last payment on</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Due amount</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Action</th>
                                        {{-- <th scope="col" class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @if ($vendors->isEmpty())
                                        <tr>
                                            <td class="whitespace nowrap px-2 py-1 text-sm sm:px-4 sm:py-1" colspan="5">
                                                No Dropshippers with due payments</td>
                                        </tr>
                                    @endif
                                    @foreach ($vendors as $item)
                                        <tr>
                                            <td class="whitespace-nowrap px-2 py-1 text-sm sm:px-4 sm:py-1">
                                                <div>
                                                    {{ $item->vendor->business_name }}
                                                </div>
                                                <div>
                                                    {{ $item->vendor->ds_number ?? 'N/A' }}
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-2 py-1 text-sm sm:px-4 sm:py-1">
                                                <div class="font-semibold">
                                                    {{ $item->vendorRevenue()->where('status', 'earned')->count() }}
                                                </div>
                                            </td>
                                            <td class="whitespace nowrap px-2 py-1 text-sm sm:px-4 sm:py-1">
                                                <div>
                                                    {{ $item->activeBankAccount->lastBankTransaction->created_at ?? 'N/A' }}
                                                </div>
                                                <div>
                                                    RS. {{ $item->activeBankAccount->lastBankTransaction->amount ?? 'N/A' }}
                                                </div>
                                            </td>
                                            <td class="whitespace nowrap px-2 py-1 text-sm sm:px-4 sm:py-1">
                                                RS. {{ $item->vendor_revenue_sum_amount }}
                                            </td>
                                            <td class="whitespace nowrap px-2 py-1 text-xs sm:px-4 sm:py-1">
                                                <a
                                                    href="{{ route('admin.payments.create', ['ds' => $item->vendor->ds_number]) }}">Transfer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <x-pagging :paginator=$products /> --}}
        <div class="py-4">
            {{ $vendors->links() }}
        </div>
    </section>
@endsection
