<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="/vite.svg" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ZeeDropShipping</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @yield('head')
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
      body {
        font-family: 'Poppins', serif;
      }
    </style>
</head>
<body>
  <div class="flex bg-gray-100 ">
    <!-- Sidebar -->
    <div id="sidebar" class="lg:flex flex-col lg:relative fixed  top-0 left-0 h-screen bg-gray-800 text-white w-64 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
      <div class="flex justify-between">
        <div class="p-4 font-bold text-lg">Admin Panel</div>
        <button class="p-4 lg:hidden" id="close-sidebar">✕</button>
      </div>
      <ul class="space-y-2">
        @role('admin')
        <li class="p-2 hover:bg-primary-700  hover:animate-pulse">
          <a href="{{ route('dashboard') }}" class="block" ><i class="fa-solid fa-home mr-2"></i> Dashboard</a>
        </li>
        <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if(request()->routeIs('admin.categories.*')) bg-primary @endif">
          <a href="{{ route('admin.categories.index') }}" class="block"><i class="fa-solid fa-share-alt mr-2"></i> Categories</a>
        </li>
        <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if(request()->routeIs('admin.products.*')) bg-primary @endif">
          <a href="{{ route('admin.products.index') }}" class="block"><i class="fa-solid fa-tag mr-2"></i> Products</a>
        </li>

        <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if(request()->routeIs('admin.shippers.*')) bg-primary @endif">
          <a href="{{ route('admin.shippers.index') }}" class="block"><i class="fa-solid fa-truck mr-2"></i> Shippers</a>
        </li>
        @endrole
        @role('vendor')
        <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if(request()->routeIs('vendor.orders.*')) bg-primary @endif">
          <a href="{{ route('vendor.orders.index') }}" class="block"><i class="fa-solid fa-home mr-2"></i> Orders</a>
        </li>
        @endrole

        @role('dispatcher')
        <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if(request()->routeIs('dispatcher.orders.*')) bg-primary @endif">
          <a href="{{ route('dispatcher.orders.index') }}" class="block"><i class="fa-solid fa-home mr-2"></i> Orders</a>
        </li>
        @endrole
        {{-- <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if(request()->routeIs('vendor.orders.*')) bg-primary @endif">
          <a href="{{ route('vendor.orders.index') }}" class="block"><i class="fa-solid fa-users mr-2"></i> Users</a>
        </li>
        <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if(request()->routeIs('vendor.orders.*')) bg-primary @endif">
          <a href="{{ route('vendor.orders.index') }}" class="block"><i class="fa-solid fa-home mr-2"></i> Levels</a>
        </li>
        <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if(request()->routeIs('vendor.orders.*')) bg-primary @endif">
          <a href="{{ route('vendor.orders.index') }}" class="block"><i class="fa-solid fa-home mr-2"></i> News</a>
        </li>
        <li class="p-2 hover:bg-primary-700 hover:animate-pulse @if(request()->routeIs('vendor.orders.*')) bg-primary @endif">
          <a href="{{ route('vendor.orders.index') }}" class="block"><i class="fa-solid fa-home mr-2"></i> Suggestions</a>
        </li>
        <li class="p-2 hover:bg-primary-700  hover:animate-pulse @if(request()->routeIs('vendor.orders.*')) bg-primary @endif">
          <a href="{{ route('vendor.orders.index') }}" class="block"><i class="fa-solid fa-home mr-2"></i> Posts</a>
        </li> --}}
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
      <header class="bg-white shadow-md p-4 flex flex-row items-center justify-between">
        <button id="menu-button" class="text-xl font-bold lg:hidden">☰</button>
        <h1 class="text-xl font-bold mb-2 sm:mb-0 hidden lg:block">Dashboard</h1>
        <div class="flex flex-wrap sm:flex-nowrap space-x-2 sm:space-x-4">
          <button class="py-1 px-3 bg-blue-600 text-white rounded-md">
            Login
          </button>
          <button class="py-1 px-3 bg-red-600 text-white rounded-md">
            Logout
          </button>
        </div>
      </header>

      <main class="flex-1 p-6 bg-gray-100 ">
        @if(session('success'))
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
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
