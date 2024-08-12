@extends('layouts.admin')
@section('content')
<div class="">

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
        <x-icon-state-card title="Total User" icon="fa-solid fa-users" value="{{ $stats['total_users'] }}" />
        <x-icon-state-card title="Total Vendors" icon="fa-solid fa-handshake" value="{{ $stats['total_vendors'] }}" />
        <x-icon-state-card title="Orders" icon="fa-solid fa-cart-shopping" value="{{ $stats['total_orders'] }}" />
        <x-icon-state-card title="Total Products" icon="fa-solid fa-tags" value="{{ $stats['total_products'] }}" />
    </div>

    <div class="w-40 mt-4 bg-white p-2 rounded-xl items-center flex flex-col">
        <canvas id="chart-1" class=""></canvas>
        <div class="text-base">Distribution Chart</div>
    </div>
</div>
@endsection

@section('js')
<script type="module">
    const ctx = document.getElementById('chart-1');
    new Chart(ctx, {
        type: 'pie',
        data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
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