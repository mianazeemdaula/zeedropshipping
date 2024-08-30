<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'ZeeDropShipping')</title>
    <meta name="description" content="">
    <meta property="og:title" content="@yield('title', 'Zee DropShipping')" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:description"
        content="Best-in-industry guides and information while cultivating a positive community." />
    <meta property="og:image" content="https://www.example.com/sample.jpg" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
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
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1482469525706513&ev=PageView&noscript=1" /></noscript>
</head>

<body class="font-calibrifont">
    <div class="">
        <div class="bg-secondary-500 text-white text-center py-2 flex-wrap">
            <div class="text-sm whitespace-nowrap relative overflow-hidden">
                <div class="inline-block whitespace-nowrap zeemarquee ">
                    Attention: Please ensure that every product you list includes its Product SKU. Accurate SKUs are
                    essential for effective inventory management and seamless order processing. Without a SKU, we cannot
                    guarantee proper tracking and fulfillment of your products.
                </div>
            </div>
        </div>
    </div>
    <header class='my-8 px-4' x-data="{ sidebar: false }">
        <div class='flex justify-between items-center'>
            <div class="flex-1">
                <div class="size-8 lg:hidden cursor-pointer" x-on:click="sidebar = !sidebar">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <div class="flex-1 flex items-center justify-center">
                <img src="{{ asset('assets/images/Logo2.png') }}" alt="Logo" class='w-32 h-[18rm] object-fill' />
            </div>

            <div class='hidden lg:flex items-center gap-1 flex-1 justify-end'>
                {{-- <div class='flex items-center p-3 rounded-lg border justify-center'>
          <i class='fa-solid fa-search text-blue-950' > </i>
          <input
            type="text"
            id='search'
            name='search'
            placeholder='Search'
            class='outline-none border-none text-black ml-2'/>
        </div> --}}
                {{-- <a href="{{ url('/login') }}"> <i class="fa-solid fa-user"></i></a> --}}
                @if (Auth::check())
                    <a href="{{ url('/dashboard') }}"
                        class="bg-secondary-600 text-white px-4 py-2 rounded-lg">{{ auth()->user()->name }}</a>
                @else
                    <a href="{{ url('/login') }}" class="bg-secondary-600 text-white px-4 py-2 rounded-lg">Login</a>
                    {{-- Register now button --}}
                    <a href="{{ url('/signup') }}" class="bg-secondary-600 text-white px-4 py-2 rounded-lg">Register
                        Now</a>
                @endif
            </div>
        </div>

        {{-- <div class='mx-4 my-24 flex items-center p-3 rounded-lg border lg:hidden'>
      <i class='fa-solid fa-search'> </i>
      <input
        type="text"
        id='search'
        name='search'
        placeholder='Search'
        class='outline-none  text-black ml-2 transition'
      />
    </div> --}}
        <aside class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform duration-300 bg-white"
            x-show="sidebar">
            <div class="flex justify-between items-center p-4">
                <img src="{{ asset('assets/images/Logo2.png') }}" alt="Logo" class='w-20 h-12 object-fill' />
                <div class="size-8 cursor-pointer" x-on:click="sidebar = !sidebar">
                    <i class="fa-solid fa-times"></i>
                </div>
            </div>
            <nav class="p-4">
                <ul>
                    <li>
                        <a href="{{ url('/') }}" class="block py-2">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/products') }}" class="block py-2">Products</a>
                    </li>
                    <li>
                        <a href="{{ url('/policies') }}" class="block py-2">Policies</a>
                    </li>
                    <li>
                        <a href="{{ url('/terms-and-conditions') }}" class="block py-2">Terms & Conditions</a>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}" class="block py-2">Contact Us</a>
                    </li>
                </ul>
            </nav>
        </aside>
        <nav class="hidden md:block w-full my-8 p-4">
            <ul class="hidden lg:flex flex-wrap lg:flex-nowrap gap-4 lg:gap-4">
                <li class="flex-1">
                    <a
                        href="{{ url('/') }}"class="block px-8 py-2 bg-primary-600 hover:bg-primary-700 text-white text-center rounded-md transform transition-transform duration-500 hover:scale-105">
                        <i class="fa-solid fa-home"></i>
                        <div class="font-bold">
                            Home
                        </div>
                    </a>
                </li>
                <li class="flex-1">
                    <a href="{{ url('products') }}"
                        class="block px-8 py-2 bg-primary-600 hover:bg-primary-700 text-white text-center rounded-md transform transition-transform duration-500 hover:scale-105">
                        <i class="fa-solid fa-tags"></i>
                        <div class="font-bold">
                            Products
                        </div>
                    </a>
                </li>
                <li class="relative group flex-1">
                    <a href="{{ url('/policies') }}"
                        class="block px-8 py-2 bg-primary-600 hover:bg-primary-700 text-white text-center rounded-md transform transition-transform duration-500 hover:scale-105"><i
                            class="fa-solid fa-scale-balanced"></i>
                        <div class="font-bold">
                            Policies
                        </div>
                    </a>
                </li>
                <li class="flex-1">
                    <a href="{{ url('/terms-and-conditions') }}"
                        class="block px-8 py-2 bg-primary-600 hover:bg-primary-700 text-white text-center rounded-md transform transition-transform duration-500 hover:scale-105">
                        <i class="fa-solid fa-file-contract"></i>
                        <div class="font-bold">
                            Terms & Conditions
                        </div>
                    </a>
                </li>
                <li class="flex-1">
                    <a href="{{ url('/contact') }}"
                        class="block px-8 py-2 bg-primary-600 hover:bg-primary-700 text-white text-center rounded-md transform transition-transform duration-500 hover:scale-105">
                        <i class="fa-solid fa-address-book "></i>
                        <div class="font-bold">
                            Contact Us
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <div class='main md:px-14'>
        @yield('content')
    </div>

    <footer class="bg-secondary-500 text-white py-6  md:pt-16 px-12">
        <div class="container mx-auto px-4 flex flex-col md:flex-row justify-around gap-10 items-start ">
            <div class="mb-6 md:mb-0">
                <h3 class="text-primary-600 font-medium mb-2 text-xl text-start">Follow Us:</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-secondary-400">
                        <i class="fa-brands fa-facebook text-2xl"></i>
                    </a>
                    <a href="#" class="text-white hover:text-secondary-400">
                        <i class="fa-brands fa-whatsapp text-2xl"></i>
                    </a>
                    <a href="#" class="text-white hover:text-secondary-400">
                        <i class="fa-brands fa-instagram text-2xl"></i>
                    </a>
                </div>
            </div>

            <div class="mb-6 md:mb-0">
                <h3 class="text-primary-600 font-medium mb-2 text-xl text-start">Support</h3>
                <ul class="space-y-1 text-sm text-start">
                    <li><a href="{{ url('/policies') }}" class="hover:text-secondary-400">Policies</a></li>
                    <li><a href="{{ url('/terms-and-conditions') }}" class="hover:text-secondary-400">Terms of
                            Conditions</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-secondary-400">Contact Us</a></li>
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

        <div class="border-t border-blue-800 mt-6 pt-4">
            <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
                <p class="text-xs text-gray-400">&copy; 2024, Zee Dropshipping Powered by
                    <a href="https://txdevs.com" class="text-white hover:text-secondary-400">TXDevs</a>
                </p>
                <a href="+923159999547
"
                    class="bg-green-500 text-black text-sm font-bold py-2 px-4 rounded hover:bg-green-600 mt-4 md:mt-0">
                    Call Us
                </a>
            </div>
        </div>
    </footer>

    <script type="module">
        // function toggleSidebar() {
        //   const sidebar = document.getElementById('sidebar');
        //   sidebar.classList.toggle('translate-x-full');
        //   sidebar.classList.toggle('translate-x-0');
        // };

        // Function to hide the sidebar
        function hideSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.add('translate-x-full');
            sidebar.classList.remove('translate-x-0');
        };

        // Attach the hideSidebar function to all sidebar links
        function addLinkClickListeners() {
            const links = document.querySelectorAll('#sidebar a');
            links.forEach(link => {
                link.addEventListener('click', hideSidebar);
            });
        };
        addLinkClickListeners();
    </script>
    @yield('scripts')
</body>

</html>
