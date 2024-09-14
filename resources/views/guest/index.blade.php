@extends('layouts.web')
@section('content')
    <!-- header Section -->

    {{-- begin slider --}}

    <div class="swiper h-36 md:h-60 lg:h-96 animate-fade-in-up">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach (range(1, 4) as $item)
                <div class="swiper-slide">
                    <img src="{{ asset("assets/banners/0$item.png") }}" alt="Work Image" class="w-full h-full " />
                </div>
            @endforeach
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>
    {{-- end slider --}}
    <div class=" p-8 mt-10 ">
        <div class="flex flex-col md:flex-row justify-evenly gap-4">
            <div class="flex-1">
                <img src="https://plus.unsplash.com/premium_photo-1661284828052-ea25d6ea94cd?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8d29ya3xlbnwwfHwwfHx8MA%3D%3D"
                    alt="Work Image" class="w-full rounded-lg shadow-lg" />
            </div>
            <div class="flex-1 ">
                <h1 class="text-2xl font-bold mb-4">About Us</h1>
                <div class='flex flex-col gap-6'>
                    <p class="text-gray-800 text-justify">
                        Welcome to Zee Dropshipping, Pakistan's premier platform for seamless and efficient Dropshipping. We
                        are dedicated to empowering entrepreneurs by providing a comprehensive solution that caters to all
                        your e-commerce needs. At Zee Dropshipping, we understand the fast-paced nature of online business,
                        and our services are designed to help you thrive in this competitive market.
                        <br /></br>We offer <span class="font-bold">same-day dispatch </span>, ensuring that your customers
                        receive their orders quickly and reliably. Our <span class="font-bold">wide range of tested
                            products</span> guarantees that you can offer quality items with confidence. With our <span
                            class="font-bold">twice-a-week payment system</span>, you can manage your cash flow more
                        effectively, allowing you to reinvest in your business.
                        <br /></br>Our commitment to quality is reflected in our <span class="font-bold">Product Quality
                            Assurance</span> program, and our <span class="font-bold">Dedicated Dropshipper Support</span>
                        team is always on hand to assist you with any challenges. We also provide <span
                            class="font-bold">automated order processing</span> and the flexibility of an <span
                            class="font-bold">optional order confirmation facility</span>. Additionally, our network of
                        <span class="font-bold">multiple logistic partners</span> ensures <span class="font-bold">nationwide
                            delivery</span>, covering every corner of Pakistan.
                        <br /></br>At Zee Dropshipping, we are more than just a service—we are your partner in success. Join
                        us today and take your business to new heights!

                    </p>
                    <a href="{{ url('/signup') }}"
                        class='bg-primary-700 hover:bg-primary-600 p-4 text-white rounded-lg self-start'>Register Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class=" p-8 mt-4 ">
        <div class="flex flex-col md:flex-row justify-evenly gap-6">
            <div class=" ">
                <h1 class="text-2xl font-bold mb-4 animate-fadeInUp2">Our Journey of Success</h1>
                <div class='flex flex-col gap-6 animate-fade-in-up'>
                    <ul class="list-decimal">
                        <li><span class="font-bold">Zee Dropshipping</span> was launched in year 2024, quickly becoming a
                            trusted name in Pakistan's e-commerce landscape.</li>
                        <li><span class="font-bold">1000+ Active Dropshippers:</span> Within the first few weeks, we
                            onboarded over 1000+ active dropshippers.</li>
                        <li><span class="font-bold">Nationwide Coverage:</span> Established partnerships with multiple
                            logistic companies, ensuring seamless nationwide delivery.</li>
                        <li><span class="font-bold">Thousands of Orders Fulfilled:</span> Successfully fulfilled thousands
                            of orders with same-day dispatch and top-notch quality assurance.</li>
                        <li><span class="font-bold">Shopify Integration:</span> Introduced a one-click Shopify integration,
                            simplifying the dropshipping process for store owners.</li>
                        <li><span class="font-bold">International Trip:</span> Launched a highly successful incentive
                            program, offering a trip to Dubai for top achievers.</li>
                        <li><span class="font-bold">Continuous Growth:</span> Expanded our product range and enhanced our
                            platform, making Zee Dropshipping a leader in the industry.</li>
                    </ul>
                </div>
            </div>
            <div class="">
                <img src="https://plus.unsplash.com/premium_photo-1661284828052-ea25d6ea94cd?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8d29ya3xlbnwwfHwwfHx8MA%3D%3D"
                    alt="Work Image" class="w-full md:w-[460px]   rounded-lg shadow-lg" />
            </div>
        </div>
    </div>

    <div class='bg-gray-100 py-11'>

        <p class='text-center font-bold text-2xl text-green-900 py-10 '>Why Choose Zee Dropshipping ?</p>
        <div class="delay-[100ms] duration-[600ms] taos:[transform:translate3d(-200px,0,0)_scale(0.6)] taos:opacity-0"
            data-taos-offset="400">
            this is the animation of the toas
        </div>
        <div class='grid grid-cols-2 md:grid-cols-4 gap-6 max-w-[1000px] mx-auto'>

            @foreach ($whyChoozeZee as $item)
                <div class='flex flex-col justify-center items-center'>
                    <div class='flex items-center justify-center bg-primary-400 text-white p-2 rounded-full size-10'>
                        {{-- {{ $loop->iteration }} --}}
                        <i class="{{ $item['icon'] }}"></i>
                    </div>
                    <p class='text-center font-semibold text-base mt-2'>{{ $item['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <div class='max-w-[800px] mx-auto my-12'>
      <h2 class='text-center text-2xl font-bold text-blue-800'>Who Are You?</h2>

      <div class='flex flex-col md:flex-row gap-6 my-7'>
        <div class="relative  w-[420px] md:w-[800px] rounded-lg">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmj6irVXYigBNppDIPGtB73hrvHHWD1scCjQ&s" alt="Your Image" class="w-full h-full object-cover" />
          <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white text-xl p-4">
            <div class='flex flex-col gap-5'>
              <p class='text-center font-bold text-2xl'>Drop shipping seller</p>
              <div class='flex gap-3 '>
                <button class='py-2 px-3 bg-yellow-400 rounded-lg text-base'>Sign UP FOR UAE</button>
                <button class='py-2 px-3 bg-primary-600 rounded-lg text-base'>Sign UP FOR UAE</button>
              </div>
            </div>
          </div>
        </div>


        <div class="relative w-[420px] md:w-[800px] rounded-lg">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmj6irVXYigBNppDIPGtB73hrvHHWD1scCjQ&s" alt="Your Image" class="w-full h-full object-cover" />
          <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white text-xl p-4">
            <div class='flex flex-col gap-5'>


              <p class='text-center font-bold text-2xl'>Drop shipping seller</p>
              <div class='flex gap-3 '>

                <button class='py-2 px-3 bg-yellow-400 rounded-lg text-base'>Sign UP FOR UAE</button>
                <button class='py-2 px-3 bg-primary-600 rounded-lg text-base'>Sign UP FOR UAE</button>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div> --}}
    {{-- <div class=' py-11'>

      <p class='text-center font-bold text-2xl text-blue-950 py-10'>Our Mile stones</p>
      <div class='grid grid-cols-1 md:grid-cols-2 gap-10 max-w-[1000px] mx-auto  '>


        <div class='flex flex-col gap-4'>

          <div class='flex justify-center items-center'>  <i class='fa-solid fa-dollar text-4xl  text-green-400' ></i></div>

          <p class='text-center font-bold text-2xl'>75%+ Delivery Ratio</p>
          <p class='text-center'>80% of our resellers get more than 75% delivery ratio in GCC markets</p>

        </div>

        <div class='flex flex-col gap-4'>

          <div class='flex justify-center items-center'>  <i class='fa-solid fa-dollar text-4xl  text-green-400' ></i></div>

          <p class='text-center font-bold text-2xl'>75%+ Delivery Ratio</p>
          <p class='text-center'>80% of our resellers get more than 75% delivery ratio in GCC markets</p>

        </div>

        <div class='flex flex-col gap-4'>

          <div class='flex justify-center items-center'>  <i class='fa-solid fa-dollar text-4xl  text-green-400' ></i></div>

          <p class='text-center font-bold text-2xl'>75%+ Delivery Ratio</p>
          <p class='text-center'>80% of our resellers get more than 75% delivery ratio in GCC markets</p>

        </div>
        <div class='flex flex-col gap-4'>

          <div class='flex justify-center items-center'>  <i class='fa-solid fa-dollar text-4xl  text-green-400' ></i></div>

          <p class='text-center font-bold text-2xl'>75%+ Delivery Ratio</p>
          <p class='text-center'>80% of our resellers get more than 75% delivery ratio in GCC markets</p>

        </div>
      </div>

    </div> --}}

    <div class='max-w-[800px] mx-auto my-12 p-2 lg:p-0 md:p-0'>

        <p class='text-center font-bold text-2xl '>What Our Top Dropshippers Say</p>
        <div class='grid grid-cols-2 px-2 md:grid-cols-2 lg:grid-cols-3 gap-8 my-8'>

            @foreach ($dropshippersSays as $item)
                <div class='flex flex-col items-center animate-fade-in-up'>
                    <div class='border-2 border-secondary-400 rounded-full size-24'>
                        <img src='{{ asset($item['image']) }}' alt=""
                            class='w-full aspect-square object-cover rounded-full' />
                    </div>
                    <p class=' mt-1 font-bold tracking-tighter'>{{ $item['name'] }}</p>
                    <p class=' my-1 text-justify text-gray-500 leading-tight'>{{ $item['comment'] }}</p>
                </div>
            @endforeach
        </div>

    </div>
    </div>
@endsection

@section('scripts')
    <script type="module">
        const swiper = new Swiper('.swiper', {
            autoplay: {
                delay: 2000,
                disableOnInteraction: false
            },
            pagination: {
                el: '.swiper-pagination',
            },
        });
    </script>
@endsection
