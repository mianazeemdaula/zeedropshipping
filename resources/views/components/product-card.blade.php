<div class="bg-white rounded-md">
    <a href="{{ url('/products', $item->id) }}">
        <div class="flex justify-between items-center">
            <img src="{{ asset($item->image) }}" alt="" srcset="" class="object-cover rounded-md w-full h-64">
        </div>
        <div class="p-2 h-32 justify-end">
            <div class="flex flex-col md:flex-row items-center justify-between  text-xs">
                <div class="text-slate-300 uppercase font-normal">{{ $item->category->name }}</div>
            </div>
            <div class="py-2">
                <h6 class="text-sm font-medium line-clamp-2">{{ $item->name }}</h6>
                <div class="flex justify-between items-center text-gray-400 text-sm {{ $sku ?? 'hidden' }}">
                    <div>SKU</div>
                    <div>{{ $item->sku }}</div>
                </div>
                <div class="flex justify-between items-center text-gray-800 text-sm font-semibold">
                    <div>Price</div>
                    <div class="">PKR-{{ number_format($item->sale_price, 0) }}</div>
                </div>
                {{-- <p class="text-xs text-slate-300 line-clamp-4">{{ $item->description }}</p> --}}
            </div>
        </div>
    </a>
</div>
