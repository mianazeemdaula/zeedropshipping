<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZeeDropShipping</title>
     <meta name="description" content="">
     <meta property="og:title" content="Zeed Dropshipping" />
     <meta property="og:url" content="{{ Request::url() }}"/>
     <meta property="og:description" content="Best-in-industry guides and information while cultivating a positive community."/>
     <meta property="og:image" content="https://www.example.com/sample.jpg"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1482469525706513');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1482469525706513&ev=PageView&noscript=1"
/></noscript>
</head> 
<body>
    <header class="bg-white relative " x-data="{ isSidebarOpen: false }">
        <div class="flex justify-between items-center px-7 py-3">
            <a href="{{ url('/') }}">
            <img src={{ asset('assets/images/Logo.png') }} alt="Logo" class="w-32 h-auto" />
            </a>
            <button class="lg:hidden text-2xl" @click="isSidebarOpen =!isSidebarOpen;">
            {{-- <button class="lg:hidden text-2xl" @click="alert('ASDSDS');"> --}}
            ☰
            </button>
            <div class="hidden lg:flex items-center justify-between gap-7">
            <nav>
                <ul class="flex items-center gap-10 text-[18px]">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                </ul>
            </nav>
            <div class="flex gap-3.5">
            @auth
                <a href="{{ url('/dashboard') }}" class="border border-gray-400 px-8 py-3 rounded-lg font-medium text-base hover:bg-primary-500 hover:text-white">Dashbaord</a>
            @else
                <a href="{{ url('/login') }}" class="border border-gray-400 px-8 py-3 rounded-lg font-medium text-base hover:bg-primary-500 hover:text-white">
                Login
                </a>
                <a href="{{ url('/signup') }}" class="border border-gray-400 px-8 py-3 rounded-lg font-medium text-base hover:bg-primary-500 hover:text-white">
                Sign Up
                </a>
            @endauth
            </div>
            </div>
        </div>

        <div
            class="fixed top-0 right-0 h-full bg-white shadow-lg transition-transform lg:hidden"
            :class="isSidebarOpen ? 'translate-x-0' : 'translate-x-full'"
        >
            <button
            class="absolute top-4 left-4 text-2xl font-bold"
            onClick={toggleSidebar}
            >
            &times;
            </button>
            <nav class="mt-12">
            <ul class="space-y-6 px-4">
                <li>
                <a href="#" x-on:click="isSidebarOpen = !isSidebarOpen" class="block text-xl">
                    Home
                </a>
                </li>
                <li>
                <a href="#" x-on:click="isSidebarOpen = !isSidebarOpen" class="block text-xl">
                    Home
                </a>
                </li>
                <li>
                <a href="#" x-on:click="isSidebarOpen = !isSidebarOpen" class="block text-xl">
                    About
                </a>
                </li>
                <li>
                <a href="#" x-on:click="isSidebarOpen = !isSidebarOpen" class="block text-xl">
                    Contact
                </a>
                </li>
                <li>
                <a href="#" x-on:click="isSidebarOpen = !isSidebarOpen" class="block text-xl">
                    Login
                </a>
                </li>
                <li>
                <a href="#" x-on:click="isSidebarOpen = !isSidebarOpen" class="block text-xl">
                    Signup
                </a>
                </li>
            </ul>
            </nav>
        </div>
    </header>
    @yield('content')
    <footer class="bg-secondary-900 px-6 py-10">
        <div class="flex flex-wrap ">
          <div class="flex flex-col gap-8 w-full md:w-1/2 lg:w-1/3">
            <img src={{ asset('assets/images/Logo.png') }} alt="" class="w-full max-w-[300px]" />
            <p class="text-[16px] text-[#FFFFFF]">
              You've reached the end of Collab P, but the journey is just
              beginning. Let us be a part of your team and help you develop the
              right solution.
            </p>
            <div class="flex gap-3 flex-col sm:flex-row">
              <button class="px-7 py-3 bg-[#09BAB1] text-white hover:cursor-pointer rounded-lg">
                As a Client
              </button>
              <button class="px-7 py-3 bg-[#09BAB1] text-white hover:cursor-pointer rounded-lg">
                As A Service Provider
              </button>
            </div>
          </div>
          <div class="flex gap-8 w-full md:w-1/2 lg:w-2/3 justify-evenly sm: pt-2">            
            <div class="flex flex-col text-white gap-4">
              <h4 class="font-medium text-[20px]">Company</h4>
              <ul class="flex flex-col text-[16px] gap-2">
                <li>
                  <a href="#">Home</a>
                </li>
                <li>
                  <a href="#">About Us</a>
                </li>
                <li>
                  <a href="#">Projects</a>
                </li>
                <li>
                  <a href="#">Industry</a>
                </li>
                <li>
                  <a href="#">Contact Us</a>
                </li>
              </ul>
            </div>

            <div class="flex flex-col text-white gap-4">
              <h4 class="font-medium text-[20px]">Community</h4>
              <ul class="flex flex-col text-[16px] gap-2">
                <li>
                  <a href="#">Docs</a>
                </li>
                <li>
                  <a href="#">Open source</a>
                </li>
                <li>
                  <a href="#">Feature</a>
                </li>
                <li>
                  <a href="#">Requests</a>
                </li>
                <li>
                  <a href="#">Online events</a>
                </li>
              </ul>
            </div>

            <div class="flex flex-col text-white gap-4">
              <h4 class="font-medium text-[20px]">Featured Skills</h4>
              <ul class="flex flex-col text-[16px] gap-2">
                <li>
                  <a href="#">Software Developers</a>
                </li>
                <li>
                  <a href="#">Web Developers</a>
                </li>
                <li>
                  <a href="#">Mobile App Developers</a>
                </li>
                <li>
                  <a href="#">iOS Developers</a>
                </li>
                <li>
                  <a href="#">Node.js Developers</a>
                </li>
                <li>
                  <a href="#">PHP Developers</a>
                </li>
                <li>
                  <a
                    href="#"
                    class="text-[#2BFFF4] border-b border-[#2BFFF4]"
                  >
                    View All
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </footer>
</body>
</html>