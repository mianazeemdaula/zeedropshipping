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
            <x-icon-state-card title="Open Orders" icon="fa-solid fa-cart-shopping" value="{{ $stats['open_orders'] }}"
                color="red" url="{{ route('admin.orders.status', 'open') }}" />
            <x-icon-state-card title="Dispatched Orders" icon="fa-solid fa-cart-shopping"
                value="{{ $stats['dispatched_orders'] }}" color="red"
                url="{{ route('admin.orders.status', 'shipped') }}" />
            <x-icon-state-card title="Canceled Orders" icon="fa-solid fa-cart-shopping"
                value="{{ $stats['canceled_orders'] }}" color="red"
                url="{{ route('admin.orders.status', 'canceled') }}" />
            <x-icon-state-card title="Intransit Orders" icon="fa-solid fa-cart-shopping"
                value="{{ $stats['intransit_orders'] }}" color="red"
                url="{{ route('admin.orders.status', 'intransit') }}" />
            <x-icon-state-card title="Total Products" icon="fa-solid fa-tags" value="{{ $stats['total_products'] }}"
                color="primary" url="{{ route('admin.products.index') }}" />
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
                labels: ['16', '17', '18', '19', '20', '21'],
                datasets: [{
                    label: 'Sales',
                    data: [12, 19, 3, 5, 15, 3],
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
                labels: ['16', '17', '18', '19', '20', '21'],
                datasets: [{
                    label: 'Sales',
                    data: [12, 19, 3, 5, 15, 3],
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
                labels: ['Dropshipper', 'Disptachers', 'Packker', 'Admin', ],
                datasets: [{
                    label: '',
                    data: [25, 15, 18, 6],
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
