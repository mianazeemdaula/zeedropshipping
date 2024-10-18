@extends('layouts.admin')

@section('content')
    <section class="mx-auto w-full max-w-7xl px-4 py-4 min-h-screen">
        <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
            <div class="flex items-center justify-between min-w-full">
                <div>
                    <h2 class="text-lg font-semibold">Revenue</h2>
                </div>
                <div>
                    <span class="font-normal">Total Earn:</span>
                    <span class="bg-primary-500 px-2 rounded-full text-white"> RS. {{ $total }}</span>
                </div>
                {{-- <a href="{{ route('vendor.bank-account.create') }}" class="px-5 text-white bg-black py-2 rounded-lg hover:bg-gray-800" >Create</a> --}}
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
                                            Order</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Description</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Credited On</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Amount</th>
                                        {{-- <th scope="col" class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white text-xs">
                                    @if ($revenues->isEmpty())
                                        <tr>
                                            <td class="whitespace nowrap px-2 py-4 sm:px-4 sm:py-4" colspan="9">
                                                No Earnings Yet</td>
                                        </tr>
                                    @endif
                                    @foreach ($revenues as $item)
                                        <tr>
                                            <td class="whitespace-nowrap px-2 py-1  sm:px-4 sm:py-2">
                                                <div class="font-medium">
                                                    {{ $item->order->id }}
                                                </div>
                                                <div>
                                                    {{ $item->order->order_number }}
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-2 py-1  sm:px-4 sm:py-1">
                                                {{ $item->description }}
                                            </td>
                                            <td class="whitespace nowrap px-2 py-1 sm:px-4 sm:py-1">
                                                {{ $item->created_at }}
                                            </td>
                                            <td class="whitespace nowrap px-2 py-1  sm:px-4 sm:py-1">
                                                {{ $item->amount }}
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
            {{ $revenues->links() }}
        </div>
    </section>
@endsection
