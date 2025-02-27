@extends('layouts.admin')

@section('content')
<div class="mx-auto">
    <div class="px-4 sm:px-8 md:px-12 bg-white rounded-lg mt-7 pt-6">
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-sm relative" role="alert">
                <strong class="font-bold">Holy smokes!</strong>
                <span class="block sm:inline">Something seriously bad happened.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('vendor.orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                {{-- <div class="flex flex-col gap-2">
                    <x-label>Payment Method</x-label>
                    <x-select name="payment_method_id">
                        @foreach($paymentMethods as $method)
                            <option value="{{ $method->id }}" {{ $method->id == $order->payment_method_id ? 'selected' : '' }} >{{ $method->name }}</option>
                        @endforeach
                    </x-select>
                </div> --}}

                {{-- <div class="flex flex-col gap-2">
                    <x-label>Name</x-label>
                    <x-input name="name" value="{{ $order->name }}" />
                </div> --}}

                @if(in_array($order->status, ['dispatched', 'delivered']))
                    <div class="flex flex-col gap-2">
                        <x-label>Tracking Number</x-label>
                        <x-input name="tracking_number" value="{{ $order->tracking_number }}" />
                    </div>
                @endif

                @if(in_array($order->status, ['packed']))
                    <div class="flex flex-col gap-2">
                    <x-label>Disptacher</x-label>
                    <x-select name="shipper_id">
                        @foreach($shippers as $shipper)
                            <option value="{{ $shipper->id }}" {{ $shipper->id == $order->shipper_id ? 'selected' : '' }} >{{ $shipper->name }}</option>
                        @endforeach
                    </x-select>
                </div>
                @endif

                <div class="flex flex-col gap-2">
                    <x-label>Status</x-label>
                    <x-select name="status">
                        @foreach(['open','packed','dispatched','canceled', 'closed', 'delivered'] as $method)
                            <option value="{{ $method }}" {{ $method == $order->status ? 'selected' : '' }} >{{ $method }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
            <div class="flex py-6 space-x-4">
                <button
                    type="submit"
                    class="font-poppins py-2 px-4 rounded-md bg-green-500 text-white hover:bg-green-600 cursor-pointer"
                >Update</button>

                <button
                    type="submit"
                    class="font-poppins py-2 px-4 rounded-md bg-red-500 text-white hover:bg-green-600 cursor-pointer"
                >Cancel</button>
            </div>
        </form>

        <div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">Product</th>
                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">Quantity</th>
                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">Price</th>
                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->details as $item)
                        <tr>
                            <td >{{ $item->product->name }}</td>
                            <td class="whitespace-nowrap px-12 py-4">{{ $item->qty }}</td>
                            <td class="whitespace-nowrap px-12 py-4">{{ $item->price }}</td>
                            <td class="whitespace-nowrap px-12 py-4">{{ $item->price * $item->qty }}</td>
                        </tr>
                    @endforeach
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
