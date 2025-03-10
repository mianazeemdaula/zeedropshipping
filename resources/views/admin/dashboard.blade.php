@extends('layouts.admin')
@section('content')
    <div class="">

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
            <x-icon-state-card title="Total User" icon="fa-solid fa-users" value="{{ $stats['total_users'] }}" color="green"
                url="{{ route('admin.user.status', 'all') }}" />
            <x-icon-state-card title="Team Members" icon="fa-solid fa-users" value="{{ $stats['total_team'] }}" color="green"
                url="{{ route('admin.user.status', 'dispatcher') }}" />
            <x-icon-state-card title="Dropshippers" icon="fa-solid fa-handshake" value="{{ $stats['total_vendors'] }}"
                color="blue" url="{{ route('admin.dropshippers.status', 'dropshipper') }}" />
            <x-icon-state-card title="Inreview Dropshippers" icon="fa-solid fa-handshake"
                value="{{ $stats['inreview_dropshippers'] }}" color="blue"
                url="{{ route('admin.dropshippers.status', 'inreview') }}" />
            <x-icon-state-card title="Inactive Dropshippers" icon="fa-solid fa-handshake"
                value="{{ $stats['inactive_dropshippers'] }}" color="blue"
                url="{{ route('admin.dropshippers.status', 'no-orders-inactive') }}" />
            <x-icon-state-card title="Total Orders" icon="fa-solid fa-cart-shopping" value="{{ $stats['total_orders'] }}"
                color="green" url="{{ route('admin.orders.index', ['status' => 'all']) }}" />
            <x-icon-state-card title="Open Orders" icon="fa-solid fa-cart-shopping" value="{{ $stats['open_orders'] }}"
                color="red" url="{{ route('admin.orders.index', ['status' => 'open']) }}" />
            <x-icon-state-card title="Dispatched Orders" icon="fa-solid fa-cart-shopping"
                value="{{ $stats['dispatched_orders'] }}" color="red"
                url="{{ route('admin.orders.index', ['status' => 'shipped']) }}" />
            <x-icon-state-card title="Canceled Orders" icon="fa-solid fa-cart-shopping"
                value="{{ $stats['canceled_orders'] }}" color="red"
                url="{{ route('admin.orders.index', ['status' => 'cancelled']) }}" />
            <x-icon-state-card title="Intransit Orders" icon="fa-solid fa-cart-shopping"
                value="{{ $stats['intransit_orders'] }}" color="red"
                url="{{ route('admin.orders.index', ['status' => 'in-transit']) }}" />
            <x-icon-state-card title="Total Products" icon="fa-solid fa-tags" value="{{ $stats['total_products'] }}"
                color="primary" url="{{ route('admin.products.index') }}" />
            <x-icon-state-card title="Total Revenue" icon="fa-solid fa-bank" value="{{ $stats['total_revenue'] }}"
                color="primary" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 my-4 shadow-xs">
            <div class="bg-white p-4 rounded-xl flex flex-col items-start">
                <h1 class="text-base font-bold">Orders</h1>
                <canvas id="chart-1" class=""></canvas>
            </div>
            <div class="bg-white p-4 rounded-xl flex flex-col items-start shadow-xs">
                <h1 class="text-base font-bold">Sales</h1>
                <canvas id="chart-2" class=""></canvas>
            </div>
            <div class=" bg-white p-4 rounded-xl flex flex-col items-start shadow-xs">
                <h1 class="text-base font-bold">Users</h1>
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
                labels: @json(array_keys($stats['chartUsers'])),
                datasets: [{
                    label: '',
                    data: @json(array_values($stats['chartUsers'])),
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
