@extends('layouts.admin')

@section('content')
    <section class="mx-auto w-full max-w-7xl px-4 py-4">
        <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
            <div class="flex items-center justify-between min-w-full bg-white p-2 rounded-lg">
                <div>
                    <h2 class="text-lg font-medium">Products</h2>
                    <form action="{{ route('admin.products.search') }}" method="post">
                        @csrf
                        <div class="flex space-x-2">
                            <x-input name="search" placeholder="Search products" />
                            <button type="submit"
                                class="px-5 text-white bg-black py-2 rounded-lg hover:bg-gray-800">Search</button>
                        </div>
                    </form>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.products.create') }}"
                        class="px-5 text-white bg-black py-2 rounded-lg hover:bg-gray-800">Create</a>
                    <x-modal title="Import Products" subTitle="Improt products form the csv file" icon="fa-solid fa-tags"
                        btnText="Import">
                        <form action="{{ route('admin.products.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-col space-y-4">
                                <x-input name="file" type="file" />
                                <button type="submit"
                                    class="px-5 text-white bg-black py-2 rounded-lg hover:bg-gray-800">Import</button>
                            </div>
                        </form>
                    </x-modal>
                </div>
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
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5 text-wrap">
                                            Product</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Purchase Price</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Sale Price</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Status</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Stock</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            SKU</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            VAT</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Low Qty</th>
                                        <th scope="col"
                                            class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @if ($products->isEmpty())
                                        <tr>
                                            <td class="whitespace nowrap px-2 py-4 text-sm sm:px-4 sm:py-4" colspan="9">
                                                No products found</td>
                                        </tr>
                                    @endif
                                    @foreach ($products as $item)
                                        <tr>
                                            <td class="whitespace-nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                <div class="flex items-center space-x-4">
                                                    <img class="h-10 w-10 rounded-full object-cover"
                                                        src="{{ asset($item->image) }}" alt="Product Image" />
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900 text-wrap">
                                                            {{ $item->name }}
                                                        </div>
                                                        <div class="text-sm text-gray-700">
                                                            {{ $item->category->name ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                RS.{{ $item->purchase_price }}
                                            </td>

                                            <td class="whitespace-nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                RS.{{ $item->sale_price }}
                                            </td>
                                            <td class="whitespace-nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                <x-status-chip :status="$item->status == 1 ? 'active' : 'inactive'" />
                                            </td>
                                            <td class="whitespace-nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                <div
                                                    class="@if ($item->stock <= $item->low_stock_report) text-white bg-red-600 rounded-md text-center @endif">
                                                    {{ $item->stock }}
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                {{ $item->sku }}
                                            </td>
                                            <td class="whitespace-nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                {{ $item->vat }}
                                            </td>
                                            <td class="whitespace-nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                                {{ $item->low_stock_report }}
                                            </td>
                                            <td
                                                class="whitespace-nowrap px-2 py-4 text-sm font-medium text-right sm:px-4 sm:py-4 space-x-1 ">
                                                <a href="{{ route('admin.products.show', $item->id) }}"
                                                    class="text-gray-700 hover:text-blue-500">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.products.edit', $item->id) }}">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>
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
            {{ $products->links() }}
        </div>
    </section>
@endsection
