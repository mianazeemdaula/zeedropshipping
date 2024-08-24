@extends('layouts.web')
@section('content')
      <div class="py-20">
        <div class="flex flex-col justify-center items-center gap-2">
          <h2 class="font-medium text-[45px]">Our Clients</h2>
          <p class="text-center text-[16px] text-[#555555] ">
            Every project we deliver showcases the hard work and dedication of
            our collaborative partners.
            <br /> This demonstrates our collective strength, as Collab P is all
            about collaboration.
          </p>
        </div>

        <div class="max-w-[1300px] mx-auto max-[1024]: px-10 max-lg:px-7 pt-8">
          <img src={{ asset('assets/images/project.png') }} alt="" class="w-full" />
        </div>
      </div>

      <div class="pt-20">
        <div class="flex justify-center items-center">
          <div class="flex flex-col gap-2">
            <h2 class="font-medium text-[45px] text-[#555555] text-center max-sm:text-[20px]">
              How Collab P makes Clients' lives easy
            </h2>
            <p class="text-center text-[16px] max-sm:text-[12px]">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
              <br />
              Lorem Ipsum has been the industry's standard dummy.
            </p>
            <div class="flex justify-center pt-6 gap-4">
              <button class="px-6 py-3 rounded-lg font-medium text-[18px] bg-[#09BAB1] text-white hover:bg-[#008E89] sm:px-4 sm:py-2 sm:text-[14px]">
                For Clients
              </button>
              <button class="px-6 py-3 rounded-lg font-medium text-[18px] bg-[#09BAB1] text-white hover:bg-[#008E89] sm:px-4 sm:py-2 sm:text-[14px]">
                For Service Providers
              </button>
            </div>
          </div>
        </div>
        <div class="flex flex-wrap gap-y-4 justify-evenly my-10 py-10 bg-[#FAFAFA]">
          <div class="w-full lg:w-1/6 md:w-1/4 sm:w-1/2 p-2 flex flex-col items-center">
            <div class="flex flex-col items-center gap-1 text-center">
              <p class="font-bold text-[24px] md:text-[28px] text-[#B6B6B6]">
                10+
              </p>
              <h4 class="font-medium text-[14px] md:text-[16px]">
                Global Warehouses
              </h4>
            </div>
          </div>
          <div class="w-full lg:w-1/6 md:w-1/4 sm:w-1/2 p-2 flex flex-col items-center">
            <div class="flex flex-col items-center gap-1 text-center">
              <p class="font-bold text-[24px] md:text-[28px] text-[#B6B6B6]">
                1,300+
              </p>
              <h4 class="font-medium text-[14px] md:text-[16px]">
                Cooperated Factories
              </h4>
            </div>
          </div>
          <div class="w-full lg:w-1/6 md:w-1/4 sm:w-1/2 p-2 flex flex-col items-center">
            <div class="flex flex-col items-center gap-1 text-center">
              <p class="font-bold text-[24px] md:text-[28px] text-[#B6B6B6]">
                1,500K+
              </p>
              <h4 class="font-medium text-[14px] md:text-[16px]">
                Trusted Ecommerce Stores
              </h4>
            </div>
          </div>
          <div class="w-full lg:w-1/6 md:w-1/4 sm:w-1/2 p-2 flex flex-col items-center">
            <div class="flex flex-col items-center gap-1 text-center">
              <p class="font-bold text-[24px] md:text-[28px] text-[#B6B6B6]">
                120+
              </p>
              <h4 class="font-medium text-[14px] md:text-[16px]">
                Partner Couriers Worldwide
              </h4>
            </div>
          </div>
        </div>
      </div>

     <div class="bg-custom-red-extra-light pb-4">
        <h2 class="font-medium text-[45px] text-center py-10">
          How to Start Dropshipping with CJ?
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 px-8 py-10 ">
          <div class="card relative bg-white shadow-lg p-6 rounded-lg max-w-[100%] sm:max-w-[407px] mx-auto">
            <div class="absolute top-0 left-0 size-14 rounded bg-green-300 flex justify-center items-center">
              <h1 class="text-xl font-bold">1</h1>
            </div>
            <div class="flex flex-col items-center gap-4 mt-12">
              <div class="pt-4">
                <img
                  src="https://tse4.mm.bing.net/th?id=OIP.QpFulb0h03TyeQznvwk_IgHaF7&pid=Api&P=0&h=220"
                  alt="Product Image"
                  class="w-full max-w-[150px] h-auto object-cover"
                />
              </div>
              <h3 class="text-[18px] font-medium tracking-tighter text-center">
                Source and Sell Winning Products
              </h3>
            </div>
          </div>
          <div class="card relative bg-white shadow-lg p-6 rounded-lg max-w-[100%] sm:max-w-[407px] mx-auto">
            <div class="absolute top-0 left-0 size-14 rounded bg-green-300 flex justify-center items-center">
              <h1 class="text-xl font-bold">2</h1>
            </div>
            <div class="flex flex-col items-center gap-4 mt-12">
              <div class="pt-4">
                <img
                  src="https://tse4.mm.bing.net/th?id=OIP.QpFulb0h03TyeQznvwk_IgHaF7&pid=Api&P=0&h=220"
                  alt="Product Image"
                  class="w-full max-w-[150px] h-auto object-cover"
                />
              </div>
              <h3 class="text-[18px] font-medium tracking-tighter text-center">
                Source and Sell Winning Products
              </h3>
            </div>
          </div>
          <div class="card relative bg-white shadow-lg p-6 rounded-lg max-w-[100%] sm:max-w-[407px] mx-auto">
            <div class="absolute top-0 left-0 size-14 rounded bg-green-300 flex justify-center items-center">
              <h1 class="text-xl font-bold">3</h1>
            </div>
            <div class="flex flex-col items-center gap-4 mt-12">
              <div class="pt-4">
                <img
                  src="https://tse4.mm.bing.net/th?id=OIP.QpFulb0h03TyeQznvwk_IgHaF7&pid=Api&P=0&h=220"
                  alt="Product Image"
                  class="w-full max-w-[150px] h-auto object-cover"
                />
              </div>
              <h3 class="text-[18px] font-medium tracking-tighter text-center">
                Source and Sell Winning Products
              </h3>
            </div>
          </div>
          <div class="card relative bg-white shadow-lg p-6 rounded-lg max-w-[100%] sm:max-w-[407px] mx-auto">
            <div class="absolute top-0 left-0 size-14 rounded bg-green-300 flex justify-center items-center">
              <h1 class="text-xl font-bold">4</h1>
            </div>
            <div class="flex flex-col items-center gap-4 mt-12">
              <div class="pt-4">
                <img
                  src="https://tse4.mm.bing.net/th?id=OIP.QpFulb0h03TyeQznvwk_IgHaF7&pid=Api&P=0&h=220"
                  alt="Product Image"
                  class="w-full max-w-[150px] h-auto object-cover"
                />
              </div>
              <h3 class="text-[18px] font-medium tracking-tighter text-center">
                Source and Sell Winning Products
              </h3>
            </div>
          </div>
        </div>
        <div class="px-5">
          <div class="bg-white rounded-md p-4 max-w-[800px] mx-auto px-5  ">
            <p>
              You may also place wholesale orders to have them stocked in CJ
              warehouses, without a store.
            </p>
          </div>
        </div>
      </div>

      <section class="bg-gray-200 p-12 my-10">
        <div class="container mx-auto text-center">
          <h2 class="text-3xl font-bold mb-8">Our Services</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center hover:scale-105 duration-1000">
              <img
                src="https://tse1.mm.bing.net/th?id=OIP.gh6OclTu9xcdYMV4AKoMkAHaE8&pid=Api"
                alt="Service One"
                class="w-32 h-32 rounded-full object-cover mb-4"
              />
              <h3 class="text-xl font-semibold mb-4">Quick Sourcing</h3>
              <p class="text-gray-700 text-center">
                When you cannot find your ideal product, we can help you find
                and send it to your agent.
              </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center hover:scale-105 duration-1000">
              <img
                src="https://wallpaperaccess.com/full/4546786.jpg"
                alt="Service Two"
                class="w-32 h-32 rounded-full object-cover mb-4"
              />
              <h3 class="text-xl font-semibold mb-4">Service Two</h3>
              <p class="text-gray-700 text-center">
                Our team specializes in delivering high-quality results for this
                service.
              </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center hover:scale-105 duration-1000">
              <img
                src="https://www.providesupport.com/blog/wp-content/uploads/2017/04/Keeping-customers-happy.jpg"
                alt="Service Three"
                class="w-32 h-32 rounded-full object-cover mb-4"
              />
              <h3 class="text-xl font-semibold mb-4">Service Three</h3>
              <p class="text-gray-700 text-center">
                We focus on providing innovative solutions for our clients in
                this area.
              </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center hover:scale-105 duration-1000">
              <img
                src="https://www.providesupport.com/blog/wp-content/uploads/2017/04/Keeping-customers-happy.jpg"
                alt="Service Three"
                class="w-32 h-32 rounded-full object-cover mb-4"
              />
              <h3 class="text-xl font-semibold mb-4">Service Three</h3>
              <p class="text-gray-700 text-center">
                We focus on providing innovative solutions for our clients in
                this area.
              </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center hover:scale-105 duration-1000">
              <img
                src="https://www.providesupport.com/blog/wp-content/uploads/2017/04/Keeping-customers-happy.jpg"
                alt="Service Three"
                class="w-32 h-32 rounded-full object-cover mb-4"
              />
              <h3 class="text-xl font-semibold mb-4">Service Three</h3>
              <p class="text-gray-700 text-center">
                We focus on providing innovative solutions for our clients in
                this area.
              </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center hover:scale-105 duration-1000">
              <img
                src="https://www.providesupport.com/blog/wp-content/uploads/2017/04/Keeping-customers-happy.jpg"
                alt="Service Three"
                class="w-32 h-32 rounded-full object-cover mb-4"
              />
              <h3 class="text-xl font-semibold mb-4">Service Three</h3>
              <p class="text-gray-700 text-center">
                We focus on providing innovative solutions for our clients in
                this area.
              </p>
            </div>
          </div>
        </div>
      </section>

      <div class="background-color mt-10">
        <h2 class="font-medium text-[45px] text-center py-12">
          Our Advantages
        </h2>

        <div class=" flex-flex-col gap-10 px-10 py-10 md:flex  ">

          <div class=" mb-5 md:w-[100%] px-6 py-8 rounded-xl bg-white ">
        
            <div class="flex gap-5 items-center">
              <div class="size-8 rounded-full bg-green-600 flex justify-center items-center">
                <i class="fa-solid fa-coffee text-white"></i>
              </div>
              <p class="hover:text-red-400 cursor-pointer">
                Product Listing Service for Multiple Platforms
              </p>
            </div>
            <hr class="my-4" />
            <div class="flex gap-5 items-center">
              <div class="size-8 rounded-full bg-green-600 flex justify-center items-center">
                <i class="fa-solid fa-coffee text-white"></i>
              </div>
              <p class="hover:text-red-400 cursor-pointer">
                Product Listing Service for Multiple Platforms
              </p>
            </div>
            <hr class="my-4" />

            <div class="flex gap-5 items-center">
              <div class="size-8 rounded-full bg-green-600 flex justify-center items-center">
                <i class="fa-solid fa-coffee text-white"></i>
              </div>
              <p class="hover:text-red-400 cursor-pointer">
                Product Listing Service for Multiple Platforms
              </p>
            </div>
            <hr class="my-4" />

            <div class="flex gap-5 items-center">
              <div class="size-8 rounded-full bg-green-600 flex justify-center items-center">
                <i class="fa-solid fa-coffee text-white"></i>
              </div>
              <p class="hover:text-red-400 cursor-pointer">
                Product Listing Service for Multiple Platforms
              </p>
            </div>
            <hr class="my-4" />
            <div class="flex gap-5 items-center">
              <div class="size-8 rounded-full bg-green-600 flex justify-center items-center">
                <i class="fa-solid fa-coffee text-white"></i>
              </div>
              <p class="hover:text-red-400 cursor-pointer">
                Product Listing Service for Multiple Platforms
              </p>
            </div>
            <hr class="my-4" />
          </div>

          <div class=" mb-5 md:w-[100%] px-6 py-8 rounded-xl bg-white ">
            <div class="flex gap-5 items-center">
              <div class="size-8 rounded-full bg-green-600 flex justify-center items-center">
                <i class="fa-solid fa-coffee text-white"></i>
              </div>

              <a
                href="https://www.youtube.com/watch?v=dRr_eF3YifA&list=RDMMwsOeCANTVPo&index=27"
                class="hover:text-red-400 cursor-pointer"
              >
                Product Listing Service for Multiple Platforms
              </a>
            </div>
            <hr class="my-4" />
            <div class="flex gap-5 items-center">
              <div class="size-8 rounded-full bg-green-600 flex justify-center items-center">
                <i class="fa-solid fa-coffee text-white"></i>
              </div>
              <p class="hover:text-red-400 cursor-pointer">
                Product Listing Service for Multiple Platforms
              </p>
            </div>
            <hr class="my-4" />

            <div class="flex gap-5 items-center">
              <div class="size-8 rounded-full bg-green-600 flex justify-center items-center">
                <i class="fa-solid fa-coffee text-white"></i>
              </div>
              <p class="hover:text-red-400 cursor-pointer">
                Product Listing Service for Multiple Platforms
              </p>
            </div>
            <hr class="my-4" />
            <div class="flex gap-5 items-center">
              <div class="size-8 rounded-full bg-green-600 flex justify-center items-center">
                <i class="fa-solid fa-coffee text-white"></i>
              </div>
              <p class="hover:text-red-400 cursor-pointer">
                Product Listing Service for Multiple Platforms
              </p>
            </div>
            <hr class="my-4" />
            <div class="flex gap-5 items-center">
              <div class="size-8 rounded-full bg-green-600 flex justify-center items-center">
                <i class="fa-solid fa-coffee text-white"></i>
              </div>
              <p class="hover:text-red-400 cursor-pointer">
                Product Listing Service for Multiple Platforms
              </p>
            </div>
            <hr class="my-4" />
          </div>
        </div>
      </div>

@endsection