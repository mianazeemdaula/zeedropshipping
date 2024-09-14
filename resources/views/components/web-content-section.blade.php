<div class="px-8 flex gap-3 py-5 {{ $revers ?? 'flex-row-reverse' }} bg-white my-4">
    @php
        $revers = $revers ?? false;
        $px = $revers ? -200 : 200;
        $px1 = $revers ? 200 : -200;
    @endphp
    <div class="flex-1 delay-[300ms] duration-[1500ms]  taos:translate-x-[{{ $px }}px] taos:opacity-0"
        data-taos-offset="200">
        <h1 class="text-3xl font-bold font-Caveat text-primary-500">{{ $titel ?? 'About Us' }}</h1>
        <p class="text-base text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod
            tempor incididunt
            ut labore et dolore magna aliqua.
            Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua.
            Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua.
            Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua.
            Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua.
            Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua.
            Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua.
            Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua.
        </p>
    </div>
    <div class="flex-1 hidden md:block lg:block">
        <div class="duration-[800ms] taos:[transform:perspective(2500px)_rotateX(-100deg)] taos:invisible taos:[backface-visibility:hidden] h-40 w-full"
            data-taos-offset="200">
            <img src="https://arkdin-nextjs.vercel.app/_next/image?url=%2Fassets%2Fimg%2Fhero_img_1.png&w=1080&q=75"
                alt="" srcset="" class="object-cover w-full h-60">
        </div>
    </div>
</div>
