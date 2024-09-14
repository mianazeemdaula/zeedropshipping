@extends('layouts.guest')
@section('content')
    <header class="bg-white md:hidden px-4" x-data={sidebar:false}>
        <div class='flex justify-between items-center'>
            <div class="flex-1">
                <div class="size-8 lg:hidden cursor-pointer" x-on:click="sidebar = !sidebar">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <div class="flex-1 flex items-center justify-end p-2">
                <img src="{{ asset('assets/images/Logo2.png') }}" alt="Logo" class='h-10 object-cover' />
            </div>
        </div>
        <aside class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform duration-300 animate-textUp bg-white"
            x-show="sidebar">
            <div class="p-4">
                <div class="size-8 cursor-pointer" x-on:click="sidebar = !sidebar">
                    <i class="fa-solid fa-times"></i>
                </div>
                {{-- create the menu here --}}
                <div class="flex flex-col space-y-4 mt-4">
                    <a href="#"
                        class="px-3 py-1 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Home</a>
                    <a href="#"
                        class="px-3 py-1 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Products</a>
                    <a href="#"
                        class="px-3 py-1 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">About</a>
                    <a href="#"
                        class="px-3 py-1 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Contact
                        Us</a>
                    <a href="#"
                        class="px-3 py-1 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Poclicies</a>
                    {{-- authenticaion routes here  --}}
                    @if (Auth::check())
                        <div class="">
                            <img src="{{ asset('/users/default.png') }}" alt="" srcset=""
                                class="size-8 rounded-full">
                        </div>
                    @else
                        <div class="border-b"></div>
                        <a href="{{ url('/login') }}"
                            class="px-3 py-1 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Login</a>
                        <a href="{{ url('/signup') }}"
                            class="px-3 py-1 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Register</a>
                    @endif
                </div>
        </aside>
    </header>
    <header class="bg-white md:flex items-center justify-between hidden">
        <div class="px-4">
            <img src="{{ asset('assets/images/Logo.png') }}" alt="" srcset="" class="h-10 object-cover">
        </div>
        <div class="flex-1 p-4 flex items-center justify-center">
            <a href="#" class="px-3 py-2 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Home</a>
            <a href="#"
                class="px-3 py-2 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Products</a>
            <a href="#" class="px-3 py-2 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">About</a>
            <a href="#" class="px-3 py-2 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Contact
                Us</a>
            <a href="#"
                class="px-3 py-2 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Poclicies</a>
        </div>
        <div class="flex justify-end bg-primary-600 rounded-l-md">
            <div class="flex items-center text-white justify-center uppercase">
                @if (Auth::check())
                    <div class="">
                        <img src="{{ asset('/users/default.png') }}" alt="" srcset="" class="size-8 ">
                    </div>
                @else
                    <a href="{{ url('/login') }}" class="px-3 py-2 w-20 duration-200 hover:animate-pulse h-full">Login</a>
                    <div class="border-r h-8 border-white"></div>
                    <a href="{{ url('/signup') }}" class="px-3 py- duration-200 hover:animate-pulse rounded-md">Register</a>
                @endif
            </div>
        </div>
    </header>
    <div class="swiper h-36 md:h-60 lg:h-96">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach (range(1, 4) as $item)
                <div class="swiper-slide bg-gray-700">
                    <div class="p-8 md:p-12">
                        <div>
                            <div class=" text-white text-xl md:text-4xl font-bold">
                                Explore the world of Dropshipping
                            </div>
                            <div class="text-white text-lg font-Caveat">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate.
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>
    <div class="bg-primary-100 my-4">
        <div class="delay-[100ms] duration-[600ms] taos:[transform:translate3d(0,200px,0)_scale(0.6)] taos:opacity-0 p-4"
            data-taos-offset="100">
            <h1 class="text-3xl font-bold text-center font-Caveat text-primary-500">Attention!</h1>

            <p class="text-center text-sm">Please ensure that every product you list includes its Product SKU.
                Accurate SKUs
                are essential for effective inventory management and seamless order processing. Without a SKU, we cannot
                guarantee proper tracking and fulfillment of your products.
            </p>
        </div>
    </div>

    <x-web-content-section :revers="true"></x-web-content-section>

    <div class="px-8 py-4">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @for ($i = 0; $i < 10; $i++)
                <div class="delay-[{{ $i + 1 }}00ms] duration-[800ms] taos:translate-y-[-100px] taos:opacity-0"
                    data-taos-offset="200">
                    <div class="bg-white rounded-md">
                        <div class="flex justify-between items-center">
                            <img src="https://sandbox-tailwindapp.vercel.app/assets/img/photos/sh2.jpg" alt=""
                                srcset="" class="object-cover rounded-md w-full">
                        </div>
                        <div class="p-2">
                            <div class="flex items-center justify-between text-xs">
                                <div class="text-slate-300 uppercase font-semibold">ELECTRONICS</div>
                                <div>
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                </div>
                            </div>
                            <div class="py-2">
                                <h6 class="text-lg font-semibold">Product Name</h6>
                                <p class="text-sm text-slate-300">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Quisquam, voluptate.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <x-web-content-section></x-web-content-section>
    <x-web-content-section :revers="true"></x-web-content-section>
    <div class="px-8 py-10 bg-gray-600">
        <div class="grid grid-cols-2 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <div class="flex items-center space-x-4 p-4 rounded-md justify-start">
                <!-- Icon -->
                <div class="bg-primary-500 p-3 rounded-2xl size-16 flex items-center justify-center rotate-45">
                    <i class="fa-solid fa-tags text-white text-2xl -rotate-45"></i>
                </div>
                <!-- Text -->
                <div class="border-r border-gray-300 border-2 h-14"></div>
                <div>
                    <p class="text-3xl font-semibold text-white" id="count1">232K</p>
                    <p class="text-sm text-gray-400 ">Products</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 rounded-md justify-start">
                <!-- Icon -->
                <div class="bg-primary-500 p-3 rounded-2xl size-16 flex items-center justify-center rotate-45">
                    <i class="fa-solid fa-users text-white text-2xl -rotate-45"></i>
                </div>
                <!-- Text -->
                <div class="border-r border-gray-300 border-2 h-14"></div>
                <div>
                    <p class="text-3xl font-semibold text-white" id="count2">232K</p>
                    <p class="text-sm text-gray-400 ">Dropshippers</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 rounded-md justify-start">
                <!-- Icon -->
                <div class="bg-primary-500 p-3 rounded-2xl size-16 flex items-center justify-center rotate-45">
                    <i class="fa-solid fa-shopping-bag text-white text-2xl -rotate-45"></i>
                </div>
                <!-- Text -->
                <div class="border-r border-gray-300 border-2 h-14"></div>
                <div>
                    <p class="text-3xl font-semibold text-white" id="count3">232K</p>
                    <p class="text-sm text-gray-400 ">Orders Fullfilled</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 rounded-md justify-start">
                <!-- Icon -->
                <div class="bg-primary-500 p-3 rounded-2xl size-16 flex items-center justify-center rotate-45">
                    <i class="fa-solid fa-truck text-white text-2xl -rotate-45"></i>
                </div>
                <!-- Text -->
                <div class="border-r border-gray-300 border-2 h-14"></div>
                <div>
                    <p class="text-3xl font-semibold text-white" id="count4">232K</p>
                    <p class="text-sm text-gray-400 ">Orders Intrasit</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 px-8 py-4">
        @foreach ($dropshippersSays as $item)
            <div class="delay-[{{ $loop->index + 1 }}00ms] duration-[800ms] taos:translate-y-[200px] taos:opacity-0"
                data-taos-offset="100">
                <div
                    class="content relative rounded shadow dark:shadow-gray-700 m-2 p-6 bg-white dark:bg-slate-900 before:content-[''] before:absolute before:start-1/2 before:-bottom-[4px] before:box-border before:border-8 before:rotate-[45deg] before:border-t-transparent before:border-e-white dark:before:border-e-slate-900 before:border-b-white dark:before:border-b-slate-900 before:border-s-transparent before:shadow-testi dark:before:shadow-gray-700 before:origin-top-left">
                    <i class="fa-solid fa-quote-left text-primary-500 text-xl"></i>
                    <p class="text-slate-400 line-clamp-4">" {{ $item['comment'] }} "</p>
                    <ul class="list-none mb-0 text-amber-400 mt-3">
                        <li class="inline"><i class="mdi mdi-star"></i></li>
                        <li class="inline"><i class="mdi mdi-star"></i></li>
                        <li class="inline"><i class="mdi mdi-star"></i></li>
                        <li class="inline"><i class="mdi mdi-star"></i></li>
                        <li class="inline"><i class="mdi mdi-star"></i></li>
                    </ul>
                </div>
                <div class="text-center mt-5"><img src="{{ asset($item['image']) }}"
                        class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                    <h6 class="mt-2 font-semibold font-Caveat text-xl">{{ explode('-', $item['name'])[0] }}</h6><span
                        class="text-slate-400 text-sm">{{ explode('-', $item['name'])[1] }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <footer class="bg-white pt-6 md:pt-4 px-12">
        <div class="container mx-auto px-4 flex flex-col md:flex-row justify-around gap-10 items-start delay-[300ms] duration-[600ms] taos:translate-y-[50px] taos:opacity-0"
            data-taos-offset="100">
            <div class="mb-6 md:mb-0">
                <h3 class="text-primary-600 font-medium mb-2 text-xl text-start">Follow Us:</h3>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-primary-400">
                        <i class="fa-brands fa-facebook text-2xl"></i>
                    </a>
                    <a href="#" class="hover:text-primary-400">
                        <i class="fa-brands fa-whatsapp text-2xl"></i>
                    </a>
                    <a href="#" class=" hover:text-primary-400">
                        <i class="fa-brands fa-instagram text-2xl"></i>
                    </a>
                </div>
            </div>

            <div class="mb-6 md:mb-0">
                <h3 class="text-primary-600 font-medium mb-2 text-xl text-start">Support</h3>
                <ul class="space-y-1 text-sm text-start">
                    <li><a href="{{ url('/policies') }}" class="hover:text-primary-400">Policies</a></li>
                    <li><a href="{{ url('/terms-and-conditions') }}" class="hover:text-primary-400">Terms of
                            Conditions</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-primary-400">Contact Us</a></li>
                </ul>
            </div>

            <div class="mb-6 md:mb-0">
                <h3 class="text-primary-600 font-medium mb-2 text-xl text-start">Powered by</h3>
                <p class="text-sm text-start">
                    ZeeDropShipping
                    <br />
                    2nd Floor Fazal Trade Center 114-E Gulberg-III
                    <br />
                    +92 315-9999547
                </p>
            </div>
        </div>

        <div class="border-t border-primary-800 mt-6 pt-4">
            <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
                <p class="text-xs text-gray-400">&copy; 2024, Zee Dropshipping Powered by
                    <a href="https://txdevs.com" class="hover:text-primary-400">TXDevs</a>
                </p>

                <a href="https://wa.me/923159999547" target="_blank"
                    class="bg-primary-500 flex justify-center fixed bottom-10 right-5 items-center size-12 rounded-full text-white text-sm font-bold py-2 px-4  hover:bg-primary-600 mt-4 md:mt-0 z-50 hover:scale-105 hover:animate-pulse">
                    <i class="fa-brands fa-whatsapp text-2xl"></i>
                </a>

            </div>
        </div>
    </footer>
@endsection


@section('scripts')
    <script type="module">
        const swiper = new Swiper('.swiper', {
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },
            pagination: {
                el: '.swiper-pagination',
            },
        });

        $(document).ready(function() {
            const countUp = new CountUp('count1', 665, {
                enableScrollSpy: true
            });
            const countUp2 = new CountUp('count2', 525, {
                enableScrollSpy: true
            });
            const countUp3 = new CountUp('count3', 1025, {
                enableScrollSpy: true
            });
            const countUp4 = new CountUp('count4', 205, {
                enableScrollSpy: true
            });
            countUp.handleScroll();
            countUp2.handleScroll();
            countUp3.handleScroll();
            countUp4.handleScroll();
        });
    </script>
@endsection
