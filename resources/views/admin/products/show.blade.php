@extends('layouts.admin')

@section('content')
    <section class="mx-auto w-full max-w-7xl px-4 py-4 mg">
        <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
            <div class="flex items center justify-between min-w-full">
                <h2 class="text-lg font-semibold">Product Details</h2>
                <a href="{{ route('admin.products.index') }}"
                    class="px-5 text-white bg-black py-2 rounded-lg hover:bg-gray-800">Back</a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-4 py-4">
            <div class="border p-4 rounded-lg bg-gray-50">
                <div class="font-bold text-sm">Product Details</div>
                <table class="text-sm w-full ">
                    <tr>
                        <td class="py-1 font-bold text-gray-500">ID:</td>
                        <td class="text-right">{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-bold text-gray-500">SKU</td>
                        <td class="text-right">{{ $product->sku }}</td>
                    </tr>

                    <tr>
                        <td class="py-1 font-bold text-gray-500">Weight:</td>
                        <td class="text-right">{{ $product->weight ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-bold text-gray-500">Purcahse Price:</td>
                        <td class="text-right">Rs. {{ $product->purchase_price ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-bold text-gray-500">Sale Price:</td>
                        <td class="text-right">Rs. {{ $product->purchase_price ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-bold text-gray-500">Discount Price:</td>
                        <td class="text-right">Rs. {{ $product->discount_price ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-bold text-gray-500">Status:</td>
                        <td class="text-right ">
                            <span
                                class="inline-flex rounded-md bg-green-200 px-4 text-xs font-semibold leading-5">{{ $product->status ? 'active' : 'inactive' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-1 font-bold text-gray-500">User:</td>
                        <td class="text-right">{{ $product->user->name ?? 'N/A' }}</td>
                    </tr>
                </table>
            </div>

            <div class="border p-4 rounded-lg bg-gray-50">
                <div class="font-bold text-sm">Sales Details</div>
                <table class="text-sm w-full ">
                    <tr>
                        <td class="py-1 font-bold text-gray-500">Available Stock:</td>
                        <td class="text-right">{{ $product->stock }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-bold text-gray-500">Total Sales:</td>
                        <td class="text-right">{{ $product->active_sales }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-bold text-gray-500">Total Return:</td>
                        <td class="text-right">{{ $product->return_sales }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-bold text-gray-500">Net Sales:</td>
                        <td class="text-right">{{ $product->stock - $product->active_sales - $product->return_sales }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-bold text-gray-500">Default Iamge:</td>
                        <td class="text-right"><img src="{{ asset($product->image) }}" alt="" srcset=""
                                class="w-40 h-40 object-cover"></td>
                    </tr>
                </table>
                <div class="grid gap-1 grid-cols-4 mt-4">
                    @foreach ($product->media as $item)
                        <div>
                            <div class="w-20 h-20">
                                <img src="{{ asset($item->file_path) }}" alt="" srcset=""
                                    class="w-full h-full object-cover">
                            </div>
                            <form action="{{ route('admin.products.defaultimage') }}" method="post" class="text-sm">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="image" value="{{ $item->file_path }}">
                                <button type="submit">Make Default</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
