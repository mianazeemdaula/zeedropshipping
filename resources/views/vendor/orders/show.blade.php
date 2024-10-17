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
                                <x-status-chip :status="$order->status" />
                            </td>
                        </tr>
                        <tr>
                            <td class="py-1">Tracking ID:</td>
                            <td class="text-right">
                                <a class="text-blue-500" target="_blank"
                                    href="https://digidokaan.pk/real-time-tracking?t_id={{ $order->track_data['tracking_no'] ?? '0' }}">
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
                            <td class="py-1">DS ID:</td>
                            <td class="text-right">{{ $order->user->vendor->ds_number }}</td>
                        </tr>
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
                    </tbody>
                </table>
                <div class="mt-4 flex justify-end space-x-2 print:hidden">
                    <a onclick="window.print();" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md cursor-pointer">
                        <i class="fa-solid fa-print mr-2"></i>Print
                    </a>
                    @if ($order->status == 'open')
                        <x-modal icon="fa-solid fa-cancel" btnText="Cancel" title="Cancel the order"
                            subTitle="Please enter the reason why the order is canceled">
                            <form action="{{ route('vendor.orders.update', $order->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="cancelled">
                                <x-input name="reason" placeholder="Enter the cancel reason" />
                                <button type="submit" class="bg-red-200 text-red-700 px-4 py-2 rounded-md mt-2">
                                    <i class="fa-solid fa-cancel"></i> Cancel Order
                                </button>
                            </form>
                        </x-modal>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
