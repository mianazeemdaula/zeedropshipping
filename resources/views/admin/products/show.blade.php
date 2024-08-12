@extends('layouts.admin')

@section('content')
<section class="mx-auto w-full h-screen max-w-7xl px-4 py-4">
    <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
        <div class="flex items center justify-between min-w-full">
            <h2 class="text-lg font-semibold">Product Details</h2>
            <a href="{{ route('admin.products.index') }}" class="px-5 text-white bg-black py-2 rounded-lg hover:bg-gray-800">Back</a>
        </div>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 divide-gray-200 border-collapse" >
            <tr>
                <td class="font-bold px-2 py-2">Name</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td class="font-bold px-2 py-2">Category</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <td class="font-bold px-2 py-2">Purchase Price</td>
                <td>RS.{{ $product->purchase_price }}</td>
            </tr>
            <tr>
                <td class="font-bold px-2 py-2">Sale Price</td>
                <td>RS.{{ $product->sale_price }}</td>
            </tr>
            <tr>
                <td class="font-bold px-2 py-2">Status</td>
                <td class="whitespace-nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                    <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                        {{ $product->status ? 'Active' : 'Inactive' }}
                    </span>
                </td>
            </tr>
            <tr>
                <td class="font-bold px-2 py-2">Stock</td>
                <td>{{ $product->stock }}</td>
            </tr>
            <tr>
                <td class="font-bold px-2 py-2">SKU</td>
                <td>{{ $product->sku }}</td>
            </tr>
            <tr>
                <td class="font-bold px-2 py-2">VAT</td>
                <td>{{ $product->vat }}</td>
            </tr>
            <tr>
                <td class="font-bold px-2 py-2">Low Qty</td>
                <td>{{ $product->low_stock_report }}</td>
            </tr>
            <tr>
                <td class="font-bold px-2 py-2">Minimum Order Qty</td>
                <td>{{ $product->min_order_qty }}</td>
            </tr>
             <tr>
                <td class="font-bold px-2 py-2">Minimum Order Qty</td>
                <td>{{ $product->max_order_qty }}</td>
            </tr>
            <tr>
                <td class="font-bold px-2 py-2">Description</td>
                <td>{!! $product->description !!}</td>
            </tr>
        </table>
    </div>
@endsection