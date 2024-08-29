<div class="p-4 shadow-lg bg-white rounded-lg hover:animate-pulse">
    <div class="bg-primary-200 rounded-full p-2 size-10 flex items-center justify-center">
        <i class="text-primary-600  {{ $icon }}"></i>
    </div>
    <a href="{{ $url ?? '#' }}">
        <div class="mt-2">
            <p class="text-xs">{{ $title }}</p>
            <p class="text-sm font-bold">{{ $value }}</p>
        </div>
    </a>
</div>