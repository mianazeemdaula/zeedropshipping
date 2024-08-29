<div>
    @php
        $color = 'gray';
        switch ($status) {
            case 'active':
                $color = 'green';
                break;
            case 'inactive':
                $color = 'red';
                break;
            case 'pending':
                $color = 'yellow';
                break;
            default:
                break;
        }
    @endphp
    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $color }}-100 text-{{ $color }}-800">
        {{ ucFirst($status) }}
    </span>
</div>