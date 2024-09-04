<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZeeDropShipping</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('head')
</head>

<body class="font-zeefont">
    <div class="flex bg-gray-100 min-h-screen">
        <!-- Sidebar -->
        <div id="sidebar"
            class="lg:flex flex-col lg:relative fixed  top-0 left-0  bg-gray-800 text-white w-64 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 print:hidden">
            <div class="flex justify-between">
                <a href="{{ route('dashboard') }}">
                    <div class="p-4 font-bold text-lg">Admin Panel</div>
                </a>
                <button class="p-4 lg:hidden" id="close-sidebar">✕</button>
            </div>
            <ul class="space-y-2">

                <li class="p-2 hover:bg-primary-700  hover:animate-pulse text-sm">
                    <a href="{{ route('dashboard') }}" class="block"><i class="fa-solid fa-home mr-2"></i>
                        Dashboard</a>
                </li>
                @role('admin')
                    <li
                        class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('admin.categories.*')) bg-primary @endif">
                        <a href="{{ route('admin.categories.index') }}" class="block"><i
                                class="fa-solid fa-share-alt mr-2"></i> Categories</a>
                    </li>
                    <li
                        class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('admin.products.*')) bg-primary @endif">
                        <a href="{{ route('admin.products.index') }}" class="block"><i class="fa-solid fa-tag mr-2"></i>
                            Products</a>
                    </li>
                    <li
                        class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('admin.orders.*')) bg-primary @endif">
                        <a href="{{ route('admin.orders.index') }}" class="block"><i
                                class="fa-solid fa-cart-shopping mr-2"></i> Orders</a>
                    </li>
                    <li
                        class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('admin.users.*')) bg-primary @endif">
                        <a href="{{ route('admin.users.index') }}" class="block"><i class="fa-solid fa-users mr-2"></i>
                            Users</a>
                    </li>
                    <li
                        class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('admin.dropshippers.*')) bg-primary @endif">
                        <a href="{{ route('admin.dropshippers.index') }}" class="block"><i
                                class="fa-solid fa-truck mr-2"></i>
                            Dropshippers</a>
                    </li>
                    <li
                        class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('admin.payments.*')) bg-primary @endif">
                        <a href="{{ route('admin.payments.index') }}" class="block"><i class="fa-solid fa-bank mr-2"></i>
                            Payments</a>
                    </li>
                    <li
                        class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('admin.shippers.*')) bg-primary @endif">
                        <a href="{{ route('admin.shippers.index') }}" class="block"><i class="fa-solid fa-truck mr-2"></i>
                            Shippers</a>
                    </li>
                @endrole
                @role('dropshipper')
                    <li
                        class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('vendor.orders.*')) bg-primary @endif">
                        <a href="{{ route('vendor.orders.index') }}" class="block"><i class="fa-solid fa-truck mr-2"></i>
                            Orders</a>
                    </li>
                    {{-- <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('vendor.bank-account.*')) bg-primary @endif">
          <a href="{{ route('vendor.bank-account.index') }}" class="block"><i class="fa-solid fa-bank mr-2"></i> Bank Account</a>
        </li> --}}
                    <li
                        class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('vendor.bank-transactions.*')) bg-primary @endif">
                        <a href="{{ route('vendor.bank-transactions.index') }}" class="block"><i
                                class="fa-solid fa-money-bill mr-2"></i>Payments</a>
                    </li>

                    <li
                        class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('vendor.revenue.*')) bg-primary @endif">
                        <a href="{{ route('vendor.revenue.index') }}" class="block"><i
                                class="fa-solid fa-dollar mr-2"></i> Revenue</a>
                    </li>
                    <li
                        class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('vendor.profile.*')) bg-primary @endif">
                        <a href="{{ route('vendor.profile.index') }}" class="block"><i class="fa-solid fa-user mr-2"></i>
                            Profile</a>
                    </li>
                @endrole

                @role('dispatcher')
                    <li
                        class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('dispatcher.orders.*')) bg-primary @endif">
                        <a href="{{ route('dispatcher.orders.index') }}" class="block"><i
                                class="fa-solid fa-home mr-2"></i> Orders</a>
                    </li>
                @endrole
                {{-- <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('vendor.orders.*')) bg-primary @endif">
          <a href="{{ route('vendor.orders.index') }}" class="block"><i class="fa-solid fa-users mr-2"></i> Users</a>
        </li>
        <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('vendor.orders.*')) bg-primary @endif">
          <a href="{{ route('vendor.orders.index') }}" class="block"><i class="fa-solid fa-home mr-2"></i> Levels</a>
        </li>
        <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('vendor.orders.*')) bg-primary @endif">
          <a href="{{ route('vendor.orders.index') }}" class="block"><i class="fa-solid fa-home mr-2"></i> News</a>
        </li>
        <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('vendor.orders.*')) bg-primary @endif">
          <a href="{{ route('vendor.orders.index') }}" class="block"><i class="fa-solid fa-home mr-2"></i> Suggestions</a>
        </li>
        <li class="p-2 hover:bg-primary-700  hover:animate-pulse @if (request()->routeIs('vendor.orders.*')) bg-primary @endif">
          <a href="{{ route('vendor.orders.index') }}" class="block"><i class="fa-solid fa-home mr-2"></i> Posts</a>
        </li> --}}
                <li
                    class="p-2 hover:bg-primary-700 hover:animate-pulse @if (request()->routeIs('change.password')) bg-primary @endif">
                    <a href="{{ route('change.password') }}" class="block"><i class="fa-solid fa-lock mr-2"></i>
                        Change Password</a>
                </li>
                <li class="p-2 hover:bg-primary-700  hover:animate-pulse">
                    <form action="{{ url('logout') }}" method="post">
                        @csrf
                        <button type="submit"><i class="fa-solid fa-sign-out mr-2"></i> Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-md p-4 flex flex-row items-center justify-between print:hidden">
                <button id="menu-button" class="text-xl font-bold lg:hidden">☰</button>
                <h1 class="text-xl font-bold mb-2 sm:mb-0 hidden lg:block">Dashboard</h1>
                <div class="flex flex-wrap sm:flex-nowrap space-x-2 sm:space-x-4 items-center">
                    <div class="text-xs">
                        {{ auth()->user()->name }}
                    </div>
                    <div class="">
                        <img src="{{ auth()->user()->avatar }}" alt="" class="w-8 h-8 rounded-full">
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6 bg-gray-100 ">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-2"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2"
                        role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.getElementById('menu-button').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
            } else {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
            }
        });
        // Close sidebar on mobile
        document.getElementById('close-sidebar').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
        });
    </script>

    @yield('js')
</body>

</html>
