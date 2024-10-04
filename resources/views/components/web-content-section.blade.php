<div class="px-8 flex gap-3 py-5 {{ $revers ?? 'flex-row-reverse' }} bg-white my-4">
    @php
        $revers = $revers ?? false;
        $px = $revers ? -200 : 200;
        $px1 = $revers ? 200 : -200;
    @endphp
    <div class="flex-1 delay-[300ms] duration-[1500ms]  taos:translate-x-[{{ $px }}px] taos:opacity-0"
        data-taos-offset="200">
        <h1 class="text-xl font-bold text-primary-500">{{ $title ?? 'About Us' }}</h1>
        {{ $slot }}
    </div>
    <div class="w-5/12 hidden md:block lg:block">
        <div class="duration-[800ms] taos:[transform:perspective(2500px)_rotateX(-100deg)] taos:invisible taos:[backface-visibility:hidden] {{ $height ?? 'h-40' }} w-full"
            data-taos-offset="200">
            <img src="{{ $image ?? 'https://arkdin-nextjs.vercel.app/_next/image?url=%2Fassets%2Fimg%2Fhero_img_1.png&w=1080&q=75' }}"
                alt="" srcset="" class="object-cover w-full rounded-lg {{ $height ?? '' }}">
        </div>
    </div>
</div>
