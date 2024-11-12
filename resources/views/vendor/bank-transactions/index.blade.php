@extends('layouts.admin')

@section('content')
    <section class="mx-auto w-full max-w-7xl px-4 py-4">
        <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
            <div class="flex items-center justify-between min-w-full bg-white p-4 rounded-lg">
                <div>
                    <h2 class="text-lg font-medium">Payments</h2>
                    <form action="{{ route('vendor.bank-transactions.search') }}" method="post">
                        @csrf
                        <div class="flex space-x-2">
                            <x-input name="search" placeholder="Search transactions" />
                            <button type="submit"
                                class="px-5 text-white bg-black py-2 rounded-lg hover:bg-gray-800">Search</button>
                        </div>
                    </form>
                </div>
                <div class="flex flex-col">
                    <span class="font-normal">Total Payout:</span>
                    <span class="bg-primary-500 text-lg px-2 rounded-full text-white"> RS. {{ $totalPayments }}</span>
                </div>
                {{-- <a href="{{ route('vendor.bank-account.create') }}" class="px-5 text-white bg-black py-2 rounded-lg hover:bg-gray-800" >Create</a> --}}
            </div>
        </div>
        <div class="mt-6 flex flex-col space-y-4 min-h-screen">
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
                                            Bank Account</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Note</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Reference</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Deductions</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Amount</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Payment Date</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Status</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Date</th>
                                        {{-- <th scope="col" class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @if ($transactions->isEmpty())
                                        <tr>
                                            <td class="whitespace nowrap px-2 py-4 text-sm sm:px-4 sm:py-4" colspan="9">
                                                No Bank Transactions</td>
                                        </tr>
                                    @endif
                                    @foreach ($transactions as $item)
                                        <tr>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm sm:px-4 sm:py-2">
                                                <div class="font-medium">
                                                    {{ $item->bankAccount->bank->name }}
                                                </div>
                                                <div>
                                                    {{ $item->bankAccount->iban }}
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                {{ $item->note }}
                                            </td>
                                            <td class="whitespace nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                {{ $item->reference }}
                                            </td>
                                            <td class="whitespace nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                {{ $item->deduction }}
                                            </td>
                                            <td class="whitespace nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                {{ $item->amount }}
                                            </td>
                                            <td class="whitespace nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                {{ $item->payment_date }}
                                            </td>

                                            <td class="whitespace nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                <x-status-chip :status="$item->status" />
                                            </td>

                                            <td class="whitespace nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                {{ $item->created_at }}
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
            {{ $transactions->links() }}
        </div>
    </section>
@endsection
