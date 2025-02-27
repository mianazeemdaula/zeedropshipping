<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Zeedropshipping')</title>
    <meta name="description" content="">
    <meta property="og:title" content="Zeed Dropshipping" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:description"
        content="Best-in-industry guides and information while cultivating a positive community." />
    <meta property="og:image" content="https://zeedropshipping.com/assets/banners/4.png" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1482469525706513');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1482469525706513&ev=PageView&noscript=1" />
    </noscript>
</head>

<body class="font-zeefont bg-gray-100">
    <header class="bg-gray-700 md:hidden px-4" x-data={sidebar:false}>
        <div class='flex justify-between items-center'>
            <div class="flex-1">
                <div class="size-8 lg:hidden cursor-pointer" x-on:click="sidebar = !sidebar">
                    <i class="fa-solid fa-bars text-white"></i>
                </div>
            </div>
            <div class="flex-1 flex items-center justify-end p-2">
                <img src="{{ asset('assets/images/Logo2.png') }}" alt="Logo" class='h-14 object-cover' />
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
                    <a href="{{ url('/') }}"
                        class="px-3 py-1 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Home</a>
                    <a href="{{ url('/products') }}"
                        class="px-3 py-1 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Products</a>
                    <a href="{{ url('/about') }}"
                        class="px-3 py-1 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">About</a>
                    <a href="{{ url('/contact') }}"
                        class="px-3 py-1 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Contact
                        Us</a>
                    <a href="{{ url('/policies') }}"
                        class="px-3 py-1 hover:bg-primary-100 duration-200 hover:animate-pulse rounded-md">Policies</a>
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
    <header class="bg-gray-700 md:flex items-center justify-between hidden">
        <div class="px-4 flex-1">
            <img src="{{ asset('assets/images/Logo.png') }}" alt="" srcset="" class="h-12 object-cover">
        </div>
        <div class="flex-1 p-4 flex items-center justify-center text-white">
            <a href="{{ url('/') }}"
                class="px-3 py-2 hover:bg-primary-600 duration-200 hover:animate-pulse rounded-md">Home</a>
            <a href="{{ url('/products') }}"
                class="px-3 py-2 hover:bg-primary-600 duration-200 hover:animate-pulse rounded-md">Products</a>
            <a href="{{ url('/about') }}"
                class="px-3 py-2 hover:bg-primary-600 duration-200 hover:animate-pulse rounded-md">About</a>
            <a href="{{ url('/contact') }}"
                class="px-3 py-2 hover:bg-primary-600 duration-200 hover:animate-pulse rounded-md">Contact
                Us</a>
            <a href="{{ url('/policies') }}"
                class="px-3 py-2 hover:bg-primary-600 duration-200 hover:animate-pulse rounded-md">Policies</a>
        </div>
        <div class="flex justify-end rounded-l-md items-center flex-1">
            <div class=" text-white font-bold mr-3 flex items-center">
                <i class="fa-solid fa-phone mr-1"></i>+92-315-9999547
            </div>
            <div class=" ">
                @if (Auth::check())
                    <a class="pr-2 flex space-x-2 items-center justify-center text-white text-sm rounded-l-md bg-primary-600 p-1"
                        href="{{ route('dashboard') }}">
                        <img src="{{ asset('/users/default.png') }}" alt="" srcset="" class="size-8 ">
                        <div>{{ auth()->user()->name }}</div>
                    </a>
                @else
                    <div
                        class="flex items-center text-white justify-center rounded-l-md bg-primary-600 uppercase text-sm">
                        <a href="{{ url('/login') }}"
                            class="px-3 py-2 w-20 duration-200 hover:animate-pulse h-full">Login</a>
                        <div class="border-r h-8 border-white"></div>
                        <a href="{{ url('/signup') }}"
                            class="px-3 py- duration-200 hover:animate-pulse rounded-md">Register</a>
                    </div>
                @endif
            </div>
        </div>
    </header>
    @yield('content')

    <footer class="bg-white pt-6 md:pt-4 px-12">
        <div class="container mx-auto px-4 flex flex-col md:flex-row justify-around gap-10 items-start delay-[300ms] duration-[600ms] taos:translate-y-[50px] taos:opacity-0"
            data-taos-offset="50">
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
                <p class="text-xs text-gray-400">&copy; 2025, Zee Dropshipping Powered by
                    <a href="https://txdevs.com" class="hover:text-primary-400">TXDevs</a>
                </p>

                <a href="https://wa.me/923159999547" target="_blank"
                    class="bg-green-500 flex justify-center fixed bottom-10 right-5 items-center size-12 rounded-full text-white text-sm font-bold py-2 px-4  hover:bg-green-600 mt-4 md:mt-0 z-50 hover:scale-105 hover:animate-pulse">
                    <i class="fa-brands fa-whatsapp text-2xl"></i>
                </a>

            </div>
        </div>
    </footer>
    @yield('scripts')
    <script src="{{ asset('assets/taos.js') }}"></script>
</body>

</html>
