@extends('layouts.admin')
@section('content')
    <div class="">

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
            <x-icon-state-card title="Open Orders" icon="fa-solid fa-users" value="{{ $stats['open_orders'] }}"
                :url="route('dispatcher.orders.status', 'open')" />
            <x-icon-state-card title="Intransit Orders" icon="fa-solid fa-handshake" :url="route('dispatcher.orders.status', 'intransit')"
                value="{{ $stats['intransit_orders'] }}" />
            <x-icon-state-card title="Canceled Orders" icon="fa-solid fa-cart-shopping" :url="route('dispatcher.orders.status', 'canceled')"
                value="{{ $stats['canceled_orders'] }}" />
            <x-icon-state-card title="Dispatched Orders" icon="fa-solid fa-tags" :url="route('dispatcher.orders.status', 'dispatched')"
                value="{{ $stats['dispatched_orders'] }}" />
            <x-icon-state-card title="Total Orders" icon="fa-solid fa-tags" value="{{ $stats['total_orders'] }}"
                :url="route('dispatcher.orders.index')" />
        </div>

        <div class="w-60 h-30 mt-4">
            <div class="bg-white p-4 rounded-xl flex flex-col items-start shadow-sm">
                <h1 class="text-base font-bold">Orders Distribution</h1>
                <canvas id="chart-1" class=""></canvas>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module">
        const ctx = document.getElementById('chart-1');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json(array_keys(collect($stats)->except('total_orders')->toArray())),
                datasets: [{
                    label: 'count ',
                    data: @json(array_values(collect($stats)->except('total_orders')->toArray())),
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                        position: 'right'
                    }
                }
            }
        });
    </script>
@endsection
