@extends('layouts.admin')

@section('content')
    <div>
        <div class="bg-white p-6 rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="border p-4 rounded-lg bg-gray-50">
                    <div class="font-bold text-sm">Order Details</div>
                    <table class="text-sm w-full ">
                        <tr>
                            <td class="py-1">Order Date:</td>
                            <td class="text-right">{{ $order->order_date }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Order ID:</td>
                            <td class="text-right">#{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Status:</td>
                            <td class="text-right ">
                                <span
                                    class="inline-flex rounded-md bg-green-200 px-4 text-xs font-semibold leading-5">{{ ucfirst($order->status) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-1">Shipper:</td>
                            <td class="text-right">{{ $order->shipper->name ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <td class="py-1">Tracking ID:</td>
                            <td class="text-right">
                                <a class="text-blue-500" target="_blank" {{-- href="https://digidokaan.pk/real-time-tracking?t_id={{ $order->track_data['tracking_no'] ?? '0' }}"> --}}
                                    href="{{ route('track.order', $order->id) }}">
                                    {{ $order->track_data['tracking_no'] ?? 'N/A' }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-1">Logistic Company:</td>
                            <td class="text-right">
                                @if ($order->track_data)
                                    {{ \App\Services\DigiDokan::$logistics[$order->track_data['gateway_id']] ?? 'N/A' }}
                            </td>
                            @endif
                        </tr>
                    </table>
                </div>

                <div class="border p-4 rounded-lg bg-gray-50">
                    <div class="font-bold text-sm">Customer Details</div>
                    <table class="text-sm w-full ">
                        <tr>
                            <td class="py-1">Name:</td>
                            <td class="text-right">{{ $order->customer_name }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Phone:</td>
                            <td class="text-right">{{ $order->customer_phone }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Email:</td>
                            <td class="text-right">{{ $order->customer_email }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Shipping Address:</td>
                            <td class="text-right">{{ $order->shipping_address }} - {{ $order->city }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Billing Address:</td>
                            <td class="text-right">{{ $order->billing_address }}</td>
                        </tr>
                    </table>
                </div>

                <div class="border p-4 rounded-lg bg-gray-50">
                    <div class="font-bold text-sm">Drop Shipper Details</div>
                    <table class="text-sm w-full ">
                        <tr>
                            <td class="py-1">Name:</td>
                            <td class="text-right">{{ $order->user->name }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Mobile:</td>
                            <td class="text-right">{{ $order->user->mobile ?? $order->user->vendor->phone }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Email:</td>
                            <td class="text-right">{{ $order->user->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mt-4">
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
                <div class="mt-4 flex justify-end space-x-2">
                    <a onclick="print();" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md">
                        <i class="fa-solid fa-print mr-2"></i>Print
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
