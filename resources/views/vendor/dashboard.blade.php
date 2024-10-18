@extends('layouts.admin')
@section('content')
    <div class="">

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
            <x-icon-state-card title="Total Sales" icon="fa-solid fa-dollar" value="{{ $stats['total_sales'] }}"
                color="blue" />
            <x-icon-state-card title="Open Orders" icon="fa-solid fa-cart-shopping" value="{{ $stats['open_orders'] }}"
                color="red" :url="route('vendor.orders.status', 'open')" />
            <x-icon-state-card title="Dispatched Orders" icon="fa-solid fa-cart-shopping"
                value="{{ $stats['dispatched_orders'] }}" color="red" :url="route('vendor.orders.status', 'shipped')" />
            <x-icon-state-card title="Canceled Orders" icon="fa-solid fa-cart-shopping"
                value="{{ $stats['canceled_orders'] }}" color="red" :url="route('vendor.orders.status', 'cancelled')" />
            <x-icon-state-card title="Intransit Orders" icon="fa-solid fa-cart-shopping"
                value="{{ $stats['intransit_orders'] }}" color="red" :url="route('vendor.orders.status', 'intransit')" />
            <x-icon-state-card title="Delivered Orders" icon="fa-solid fa-cart-shopping"
                value="{{ $stats['delivered_orders'] }}" color="red" :url="route('vendor.orders.status', 'delivered')" />
            <x-icon-state-card title="Total Revenue" icon="fa-solid fa-dollar" value="{{ $stats['total_revenue'] ?? 0 }}"
                color="red" :url="route('vendor.revenue.index')" />
            <x-icon-state-card title="Total Payments" icon="fa-solid fa-money-bill"
                value="{{ $stats['total_payments'] ?? 0 }}" color="red" :url="route('vendor.bank-transactions.index')" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 my-4 shadow-sm">
            <div class="bg-white p-4 rounded-xl flex flex-col items-start">
                <h1 class="text-base font-bold">Orders</h1>
                <canvas id="chart-1" class=""></canvas>
            </div>
            <div class="bg-white p-4 rounded-xl flex flex-col items-start shadow-sm">
                <h1 class="text-base font-bold">Sales</h1>
                <canvas id="chart-2" class=""></canvas>
            </div>
            <div class=" bg-white p-4 rounded-xl flex flex-col items-start shadow-sm">
                <h1 class="text-base font-bold">Payments</h1>
                <canvas id="chart-3" class=""></canvas>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module">
        const ctx1 = document.getElementById('chart-1');
        const ctx2 = document.getElementById('chart-2');
        const ctx3 = document.getElementById('chart-3');
        new Chart(ctx1, {
            type: 'line',
            responsive: true,
            data: {
                labels: @json(array_keys($stats['chartOrders'])),
                datasets: [{
                    label: 'Sales',
                    data: @json(array_values($stats['chartOrders'])),
                    tension: 0.4,
                    borderColor: 'rgb(234, 50, 57)',
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    },
                }
            },
        });
        new Chart(ctx2, {
            type: 'bar',
            responsive: true,
            data: {
                labels: @json(array_keys($stats['chartSales'])),
                datasets: [{
                    label: 'Sales',
                    data: @json(array_values($stats['chartSales'])),
                    barThickness: 20,
                    backgroundColor: 'rgb(234, 50, 57)',
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    },
                }
            },
        });
        new Chart(ctx3, {
            type: 'line',
            responsive: true,
            data: {
                labels: @json(array_keys($stats['chartPayments'])),
                datasets: [{
                    label: '',
                    data: @json(array_values($stats['chartPayments'])),
                    backgroundColor: 'rgb(234, 50, 0)',
                    borderColor: 'rgb(234, 50, 57)',
                    tension: 0.4,
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    },
                }
            },
        });
    </script>
@endsection
