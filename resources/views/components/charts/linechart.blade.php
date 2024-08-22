<div class=" bg-white p-4 rounded-xl flex flex-col items-start">
    <h1 class="text-base font-bold">{{ $label ?? 'Users' }}</h1>
    <canvas id="{{ $id ?? 'chart-1' }}" class=""></canvas>
</div>

@section('js')
<script type="module">
    var ctx1 = document.getElementById('{{ $id ?? 'chart-1' }}');
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
</script>
@endsection