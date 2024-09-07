@extends('layouts.admin')

@section('content')
    <div class="mx-auto">
        <div class="px-4 sm:px-8 md:px-12 bg-white rounded-lg mt-7 pt-6">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Holy smokes!</strong>
                    <span class="block sm:inline">Something seriously bad happened.</span>
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('vendor.orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="add_product">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                    <div>
                        <x-label>Product</x-label>
                        <x-input name="sku" value="" placeholder="Enter SKU" />
                    </div>
                </div>
                <div class="flex py-6 space-x-4">
                    <button type="submit"
                        class="font-poppins py-2 px-4 rounded-md bg-green-500 text-white hover:bg-green-600 cursor-pointer">Update</button>

                    <button type="submit"
                        class="font-poppins py-2 px-4 rounded-md bg-red-500 text-white hover:bg-green-600 cursor-pointer">Cancel</button>
                </div>
            </form>

            <div>
                <table class="min-w-full divide-y divide-gray-200 ">
                    <thead class="bg-gray-50 rounded-tr rounded-tl">
                        <tr>
                            <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">ID</th>
                            <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">Product</th>
                            <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">Quantity</th>
                            <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">Price</th>
                            <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($order->details as $item)
                            <tr class="">
                                <td class="px-4 py-3.5 text-sm font-normal text-gray-700 border">#{{ $item->product->sku }}
                                </td>
                                <td class="px-4 py-3.5 text-sm font-normal text-gray-700">
                                    <div class="flex items-center">
                                        <div class="w-6 mr-4">
                                            <img src="{{ asset($item->product->image) }}" alt="" srcset="">
                                        </div>
                                        <div class="text-sm">{{ $item->product->name }}</div>
                                    </div>
                                </td>
                                <td class="px-4 py-3.5 text-sm font-normal text-gray-700 border">{{ $item->qty }}</td>
                                <td class="px-4 py-3.5 text-sm font-normal text-gray-700 border">RS.{{ $item->price }}
                                </td>
                                <td class="px-4 py-3.5 text-sm font-normal text-gray-700 border">
                                    RS.{{ $item->qty * $item->price }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="px-4 py-3.5 text-sm font-bold text-gray-400 text-right">Subtotal</td>
                            <td class="px-4 py-3.5 text-sm font-normal text-gray-700">RS.{{ $order->total }}</td>
                        </tr>

                        <tr>
                            <td colspan="4" class="px-4 py-3.5 text-sm font-bold text-gray-400 text-right">Delivery
                                Charges</td>
                            <td class="px-4 py-3.5 text-sm font-normal text-gray-700">RS.{{ $order->shipping_cost }}</td>
                        </tr>

                        <tr>
                            <td colspan="4" class="px-4 py-3.5 text-sm font-bold text-gray-400 text-right">Tax</td>
                            <td class="px-4 py-3.5 text-sm font-normal text-gray-700">RS.{{ $order->tax }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="px-4 py-3.5 text-sm text-gray-400 text-right font-bold">Total</td>
                            <td class="px-4 py-3.5 text-sm font-normal text-gray-700">
                                RS.{{ $order->tax + $order->shipping_cost + $order->total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('head')
    {{-- <script src="https://cdn.tiny.cloud/1/kput55tw7sf7m8nadh5lth5ghsdshrjgwfbj9ju8hcdigf4a/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: '#mytextarea'
      });
    </script> --}}
@endsection
