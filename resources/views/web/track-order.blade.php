@extends('layouts.admin')
@section('content')
    <div class="mx-auto">
        <div class="px-4 sm:px-8 md:px-12 bg-white rounded-lg mt-7 p-4">
            <div>
                <h1 class="text-xl font-bold">Tracking Information</h1>
                <div>
                    <p class="text-sm">Order ID: {{ request()->id }}</p>
                    <p class="text-sm">Order Status: <x-status-chip :status="$response->status" /> </p>
                </div>
            </div>
            <table class="min-w-full divide-y divide-gray-200 mt-4">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-2 text-left text-sm font-normal text-gray-700">
                            Status</th>
                        <th scope="col" class="px-4 py-2 text-left text-sm font-normal text-gray-700">
                            Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white text-sm">
                    @foreach (collect($response->data)->sortBy('date_time') as $item)
                        <tr>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->date_time }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
