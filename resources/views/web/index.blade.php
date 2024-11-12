@extends('layouts.web')
@section('content')
    <div class="swiper h-40 md:h-60 lg:h-96">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach (range(2, 6) as $i)
                <div class="swiper-slide bg-gray-700">
                    <img src="{{ asset("assets/banners/$i.png") }}" alt="" srcset=""
                        class="object-cover w-full h-full">
                </div>
            @endforeach
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>
    <div class="bg-primary-100 my-4">
        <div class="relative flex overflow-x-hidden py-4">
            <div class="animate-marquee whitespace-nowrap">
                <p class="text-sm px-8">
                    <i class="font-semibold text-primary-500">Attention</i> Every listed product must include its SKU for
                    smooth inventory management and order processing. Missing SKUs may cause tracking and fulfillment
                    issues.
                    <i class="font-semibold">Note:</i> Cut-off time for same-day dispatch is 9:00 AM.
                </p>
            </div>
        </div>
    </div>

    <x-web-content-section :revers="true" title="Pakistan’s Top Dropshipping Platform for Instant Business Growth"
        image="{{ asset('assets/images/home.jpg') }}" height="h-[320px]">
        <p class="text-sm">
            Elevate your online business with Zee Dropshipping, Pakistan’s most reliable and efficient dropshipping
            solution. Our platform provides same-day dispatch and a wide range of quality products, helping you stay ahead
            in the competitive market. With exclusive product locking, you can offer unique items that set your store apart
            from others.
        </p><br>
        <p class="text-sm">
            At Zee Dropshipping, we prioritize your growth and success. Our automated order processing simplifies your
            operations, allowing you to focus on scaling your sales without the stress of logistics. Our dedicated support
            team is always available to assist you, providing guidance and solutions to any challenges you may face.
        </p>
        <br>
        <p class="text-sm">
            Join Zee Dropshipping today and transform your e-commerce experience. With our efficient systems and
            comprehensive support, you can expand your online presence and increase your profits effortlessly. Whether you
            are an experienced dropshipper or just starting, our platform equips you with everything you need to thrive in
            the digital marketplace. Experience instant business growth with us and take your online venture to new heights.
        </p>
        <div class="mt-4">
            <a href="{{ url('/signup') }}" class="bg-primary-500 text-white px-4 py-2 rounded-md hover:bg-primary-600">Get
                Started</a>
        </div>
    </x-web-content-section>
    <div class="my-2 px-8 flex items-center justify-between">
        <div class="text-xl text-primary-500 font-semibold">
            New Listings
        </div>
        <a href="{{ url('/products') }}">All Products</a>
    </div>
    <div class="px-8 py-4">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach ($products as $item)
                <div class="delay-[{{ $item->index + 1 }}00ms] duration-[800ms] taos:translate-y-[-100px] taos:opacity-0"
                    data-taos-offset="200">
                    <x-product-card :item="$item"></x-product-card>
                </div>
            @endforeach
        </div>
        <div class="my-2 flex items-center justify-center">
            <a href="{{ url('/products') }}" class="">View All</a>
        </div>
    </div>

    <x-web-content-section title="Benefits for Premier Dropshippers" image="{{ asset('assets/images/home2.jpg') }}">
        <p class="text-sm my-4">
            Unlock unparalleled advantages with Zee Dropshipping’s Premier Dropshipper Program. Here's what you get as a
            premier Dropshipper.
        </p>
        <div class="ml-6">
            <div class="text-primary-500 font-bold">
                <i class="fa-solid fa-check-square my-2"></i>
                Exclusive Product Locking:
            </div>
            <p class="text-sm my-2">
                Be the sole seller of top-performing products, reducing competition and increasing your sales potential.
                This ensures your store stands out with unique offerings that only you can sell.
            </p>
            <div class="text-primary-500 font-bold">
                <i class="fa-solid fa-check-square my-2"></i>
                Priority Support:
            </div>
            <p class="text-sm my-2">
                Receive rapid assistance from our dedicated team to keep your operations running smoothly. Quick issue
                resolution helps you avoid disruptions and maintain customer satisfaction.
            </p>
            <div class="text-primary-500 font-bold">
                <i class="fa-solid fa-check-square my-2"></i>
                Twice-a-Week Payments:
            </div>
            <p class="text-sm my-2">
                Enjoy a steady cash flow with bi-weekly payments, allowing faster reinvestment into your business. This
                financial flexibility helps in planning and scaling your operations efficiently.
            </p>
            <div class="text-primary-500 font-bold">
                <i class="fa-solid fa-check-square my-2"></i>
                Early Access to New Product Launches:
            </div>
            <p class="text-sm my-2">
                Get ahead of the competition by offering the latest products to your customers first. Early access means you
                can
                attract more customers and boost sales with trendy items.
            </p>
        </div>
    </x-web-content-section>
    <x-web-content-section :revers="true" title="How to Work with Zee Dropshipping (Step by Step Process)"
        image="{{ asset('assets/images/home3.jpeg') }}">
        <div class="text-primary-500 font-bold mt-4 delay-[300ms] duration-[500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="50">
            <i class="fa-solid fa-check-square my-2"></i>
            1. Register Now:
        </div>
        <p class="text-sm mb-1 delay-[500ms] duration-[500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="100">
            Sign up on the Zee Dropshipping platform by filling in the required details to create your account.
        </p>
        <div class="text-primary-500 font-bold mt-4 delay-[300ms] duration-[1500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="50">
            <i class="fa-solid fa-check-square my-2"></i>
            2. Account Approval:
        </div>
        <p class="text-sm mb-1 delay-[500ms] duration-[500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="100">
            After registration, your account will be reviewed. Once approved, you’ll gain access to the portal for order
            tracking and management.
        </p>
        <div class="text-primary-500 font-bold delay-[300ms] duration-[500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="50">
            <i class="fa-solid fa-check-square my-2"></i>
            3. Download Shopify App
        </div>
        <p class="text-sm my-2 delay-[500ms] duration-[500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="100">
            Download the Zee Dropshipping app from the Shopify App Store and integrate it with your store for seamless
            dropshipping.
        </p>

        <div class="text-primary-500 font-bold delay-[300ms] duration-[500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="50">
            <i class="fa-solid fa-check-square my-2"></i>
            4. Copy Product SKU
        </div>
        <p class="text-sm my-2 delay-[500ms] duration-[500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="100">
            Browse our product catalog and copy the SKUs of the items you wish to sell for easy order placement.
        </p>
        <div class="text-primary-500 font-bold delay-[300ms] duration-[500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="50">
            <i class="fa-solid fa-check-square my-2"></i>
            5. Forward Your Orders
        </div>
        <p class="text-sm my-2 delay-[500ms] duration-[500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="100">
            When a customer places an order, go to the Orders section, click the three dots next to the order, and select
            "Fulfill by Zee Dropshipping" to forward the order details. You can also upload bulk orders through the portal.
        </p>
        <div class="text-primary-500 font-bold delay-[300ms] duration-[500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="50">
            <i class="fa-solid fa-check-square my-2"></i>
            6. Order Dispatch
        </div>
        <p class="text-sm my-2 delay-[500ms] duration-[500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="100">
            Zee Dropshipping will process and dispatch your orders on the same day. A CN number will be generated for
            real-time tracking.
        </p>
        <div class="text-primary-500 font-bold delay-[300ms] duration-[500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="50">
            <i class="fa-solid fa-check-square my-2"></i>
            7. Profit Transfer
        </div>
        <p class="text-sm my-2 delay-[500ms] duration-[500ms]  taos:translate-y-[150px] taos:opacity-0"
            data-taos-offset="100">
            After delivery, your profit will be transferred to your account according to our payment schedule.
        </p>

    </x-web-content-section>
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

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 px-8 py-4">
        @foreach ($dropshippersSays as $item)
            <div class="delay-[{{ $loop->index + 1 }}00ms] duration-[800ms] taos:translate-y-[200px] taos:opacity-0"
                data-taos-offset="100">
                <div
                    class="content relative rounded shadow dark:shadow-gray-700 m-2 p-6 bg-white dark:bg-slate-900 before:content-[''] before:absolute before:start-1/2 before:-bottom-[4px] before:box-border before:border-8 before:rotate-[45deg] before:border-t-transparent before:border-e-white dark:before:border-e-slate-900 before:border-b-white dark:before:border-b-slate-900 before:border-s-transparent before:shadow-testi dark:before:shadow-gray-700 before:origin-top-left">
                    <i class="fa-solid fa-quote-left text-primary-500 text-xl"></i>
                    <p class="text-slate-400 text-justify">" {{ $item['comment'] }} "</p>
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
                    <h6 class="mt-2 text-lg">{{ explode('-', $item['name'])[0] }}</h6><span
                        class="text-slate-400 text-sm">{{ explode('-', $item['name'])[1] }}</span>
                </div>
            </div>
        @endforeach
    </div>

    {{-- our logistic companies --}}
    <div class="px-32 py-4">
        <div class="flex items-center justify-center my-2 text-2xl text-primary-500 font-medium">
            Our Logistic Partners
        </div>
        <div class="grid grid-col-2 md:grid-cols-3 lg:grid-cols-6 gap-3 items-center">
            @foreach (['tcs.png', 'trax.svg', 'm_and_p.png', 'leopardscourier-logo.png', 'postex.webp', 'daaklogo.png'] as $item)
                <div class="flex justify-center items-center bg-gray-300 p-8 rounded-lg delay-[{{ $loop->index + 1 }}00ms] duration-[800ms] taos:translate-y-[200px] taos:opacity-0"
                    data-taos-offset="30">
                    <img src="{{ asset("assets/logos/$item") }}" alt="" class="h-14 object-contain">
                </div>
            @endforeach
        </div>
    </div>
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
            const countUp = new CountUp('count1', 665 + {{ $productsCount }}, {
                enableScrollSpy: true
            });
            const countUp2 = new CountUp('count2', 525 + {{ $userCount }}, {
                enableScrollSpy: true
            });
            const countUp3 = new CountUp('count3', 1025 + {{ $ordersCount }}, {
                enableScrollSpy: true
            });
            const countUp4 = new CountUp('count4', 205 + {{ $ordersCount }}, {
                enableScrollSpy: true
            });
            countUp.handleScroll();
            countUp2.handleScroll();
            countUp3.handleScroll();
            countUp4.handleScroll();
        });
    </script>
@endsection
