<div class="flex items-center justify-center">
    @php
        $color = 'gray';
        switch ($status) {
            case 'active':
            case 'completed':
            case 'delivered':
                $color = 'green';
                break;
            case 'inactive':
            case 'cancelled':
                $color = 'red';
                break;
            case 'pending':
            case 'open':
                $color = 'yellow';
                break;
            default:
                break;
        }
    @endphp
    <span class="px-2 inline-flex text-xs leading-5 rounded-full bg-{{ $color }}-500 text-white">
        {{ ucFirst($status) }}
    </span>
</div>
