@extends('layouts.admin')
@section('content')
<div class="">

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
        @foreach([1,2,3,4,5,6,7,8,9,10,11,12] as $card)
            <x-icon-state-card title="Orders" icon="fa-solid fa-home" value="Rs. 5555" />
        @endforeach
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