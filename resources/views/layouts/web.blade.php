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
<body class="font-zeefont">

  <header class='my-8 px-4' x-data="{sidebar:false}">
        <div class='flex justify-between items-center'>
          <div class="flex-1">
            <div class="size-8 lg:hidden cursor-pointer" x-on:click="sidebar = !sidebar">
              <i class="fa-solid fa-bars"></i>
            </div>
          </div>
          <div class="flex-1 flex items-center justify-center">
            <img
              src="https://img.freepik.com/free-psd/engraved-black-logo-mockup_125540-223.jpg"
              alt="Logo"
              class='size-28'
            />
          </div>

          <div class='hidden lg:flex items-center gap-4 flex-1 justify-end'>
            <div class='flex items-center p-3 rounded-lg border justify-center'>
              <i class='fa-solid fa-search text-blue-950' > </i>
              <input
                type="text"
                id='search'
                name='search'
                placeholder='Search'
                class='outline-none border-none text-black ml-2'/>
            </div>
           <a href="{{ url('/login') }}"> <i class="fa-solid fa-user"></i></a>
          </div>
        </div>

        <div class='mx-4 my-24 flex items-center p-3 rounded-lg border lg:hidden'>
          <i class='fa-solid fa-search'> </i>
          <input
            type="text"
            id='search'
            name='search'
            placeholder='Search'
            class='outline-none  text-black ml-2 transition'
          />
        </div>
        <div
          id='sidebar'
          x-show='sidebar'
          class='fixed inset-0 bg-gray-800 z-50 transform translate-x-full transition-transform duration-300 lg:hidden'
          :class="sidebar ? 'translate-x-full' : 'translate-x-0'"
        >
          <div class='relative w-64 h-full bg-gray-900 text-white'>
            <button class='absolute top-4 right-4 text-2xl text-white' x-on:click="sidebar = !sidebar">
              <i class="fa-solid fa-home"></i>
            </button>
            <nav class='mt-12'>
              <ul>
                <li>
                  <a href="https://youtu.be/Xgi5ljHgSmo?si=A0CpUqhwddbj1eFE" class="block px-4 py-2 hover:bg-blue-600 transition-colors">Home</a>
                </li>
                <li class='relative group'>
                  <a href="#" class="block px-4 py-2 hover:bg-blue-600 transition-colors">
                    About
                  </a>
                  <div class="absolute left-full top-0 mt-2 w-48 bg-gray-800 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <ul>
                      <li>
                        <a
                          href="#"
                          class="block px-4 py-2 text-white hover:bg-blue-600 transition-colors"
                        >
                          Team
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="block px-4 py-2 text-white hover:bg-blue-600 transition-colors"
                        >
                          History
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="block px-4 py-2 text-white hover:bg-blue-600 transition-colors"
                        >
                          Values
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <a href="{{ url('products') }}" class="block px-4 py-2 hover:bg-blue-600 transition-colors">Products</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-blue-600 transition-colors">Portfolio</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-blue-600 transition-colors">Contact</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <nav class="hidden md:block w-full my-8 p-4">
          <ul class="hidden lg:flex flex-wrap lg:flex-nowrap gap-4 lg:gap-4">
            <li class="flex-grow">
              <a href="#"
                class="block px-8 py-10 bg-primary-600 hover:bg-primary-700 text-white text-center rounded-md transform transition-transform duration-500 hover:scale-105"
              >Home</a>
            </li>

            <li class="relative group flex-grow">
                  <a href="#"
                    class="block px-8 py-10 bg-primary-600 hover:bg-primary-700 text-white text-center rounded-md transition-colors"
                  >About</a>
                <div class="group-hover:block hidden absolute left-0 mt-1 w-full z-40 bg-primary-600 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  <ul>
                    <li>
                      <a
                        href="#"
                        class="block px-4 py-2 text-white hover:bg-primary-400 transition-colors rounded-lg"
                      >
                        Team
                      </a>
                    </li>
                    <li>
                      <a
                        href="#"
                        class="block px-4 py-2 text-white hover:bg-primary-400 transition-colors rounded-lg"
                      >
                        History
                      </a>
                    </li>
                    <li>
                      <a
                        href="#"
                        class="block px-4 py-2 text-white hover:bg-primary-400 transition-colors rounded-lg"
                      >
                        Values
                      </a>
                    </li>
                    <li>
                      <a
                        href="#"
                        class="block px-4 py-2 text-white hover:bg-primary-400 transition-colors rounded-lg"
                      >
                        Values
                      </a>
                    </li>
                    <li>
                      <a
                        href="#"
                        class="block px-4 py-2 text-white hover:bg-primary-400 transition-colors rounded-lg"
                      >
                        Values
                      </a>
                    </li>
                  </ul>
                </div>
            </li>

            <li class="flex-grow">
              <a href="{{ url('products') }}"
                class="block px-8 py-10 bg-primary-600 hover:bg-primary-700 text-white text-center rounded-md transition-colors">Products</a>
            </li>
            <li class="flex-grow">
              <a
                href="#"
                class="block px-8 py-10 bg-primary-600 hover:bg-primary-700 text-white text-center rounded-md transition-colors"
              >
                Portfolio
              </a>
            </li>
            <li class="flex-grow">
              <a
                href="#"
                class="block px-8 py-10 bg-primary-600 hover:bg-primary-700 text-white text-center rounded-md transition-colors"
              >
                Contact
              </a>
            </li>
          </ul>
        </nav>
    </header>
  <div class='main md:px-14'>
    @yield('content')
  </div>
     
  <footer class="bg-blue-900 text-white py-6  md:pt-16 px-12">
      <div class="container mx-auto px-4 flex flex-col md:flex-row justify-around gap-10 items-start ">
        <div class="mb-6 md:mb-0">
          <h3 class="text-secondary-400 font-medium mb-2 text-xl whitespace-nowrap">FOLLOW US:</h3>
          <div class="flex space-x-4">
            <a href="#" class="text-white hover:text-secondary-400">
              <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="#" class="text-white hover:text-secondary-400">
              <i class="fa-brands fa-whatsapp"></i>
            </a>
            <a href="#" class="text-white hover:text-secondary-400">
              <i class="fa-brands fa-instagram"></i>
            </a>
          </div>
        </div>

        <div class="mb-6 md:mb-0">
          <h3 class="text-secondary-400 font-medium mb-2 text-xl text-start">Support</h3>
          <ul class="space-y-1 text-sm text-start">
            <li><a href="#" class="hover:text-secondary-400">Refund & Replacement Policy (For Resellers)</a></li>
            <li><a href="#" class="hover:text-secondary-400">Refund and Replacement Policy (primaryers)</a></li>
            <li><a href="#" class="hover:text-secondary-400">Privacy Policy</a></li>
            <li><a href="#" class="hover:text-secondary-400">Terms of Service</a></li>
          </ul>
        </div>

        <div class="mb-6 md:mb-0">
          <h3 class="text-secondary-400 font-medium mb-2 text-xl text-start">Powered by</h3>
          <p class="text-sm text-start">
            myzambeeL is powered and owned by Tazah Global L.L.C-FZ
            <br />
            Warehouse # 13, Plot # 4488, PO Box 5841, Al Sajaa Industrial, Sharjah
          </p>
        </div>
      </div>

      <div class="border-t border-blue-800 mt-6 pt-4">
        <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
          <p class="text-xs text-gray-400">&copy; 2024, Zambeel Powered by 
            <a href="https://txdevs.com" class="text-white hover:text-secondary-400">TXDevs</a>
          </p>
          <button class="bg-green-500 text-black text-sm font-bold py-2 px-4 rounded hover:bg-green-600 mt-4 md:mt-0">
            Book a Call
          </button>
        </div>
      </div>
    </footer>

  <script type="module">
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('translate-x-full');
      sidebar.classList.toggle('translate-x-0');
    };

    // Function to hide the sidebar
    function hideSidebar  ()  {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.add('translate-x-full');
      sidebar.classList.remove('translate-x-0');
    };

    // Attach the hideSidebar function to all sidebar links
    function addLinkClickListeners  () {
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