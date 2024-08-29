@extends('layouts.web')
@section('content')
<!-- header Section -->
    <div class='px-14 md:px-0'>
      <div class="relative flex flex-col items-center text-center">
        <img src="https://png.pngtree.com/thumb_back/fh260/back_pic/00/02/44/5056179b42b174f.jpg" alt="Background Image" class="w-full  object-cover rounded-lg shadow-lg" />
        <div class="absolute top-1/2 transform -translate-y-1/2 px-4 py-6  text-white rounded-lg max-w-md w-full">
          <p class="text-3xl font-bold text-yellow-400 mb-4">Zambeel is now active in KSA</p>
          <p class="text-lg mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam, eos.</p>
          <button class=" w-full px-8 py-4 bg-primary-200 text-gray-800 rounded-lg md:self-center hover:bg-primary-600 transition-colors">Signup</button>
        </div>
      </div>
    </div>
    {{-- begin slider --}}

    {{-- <swiper-container>
      <swiper-slide>Slide 1</swiper-slide>
      <swiper-slide>Slide 2</swiper-slide>
      <swiper-slide>Slide 3</swiper-slide>
      <swiper-slide>Slide ...</swiper-slide>
    </swiper-container> --}}
    {{-- end slider --}}
    <div class=" p-8 mt-32 ">
      <div class="flex flex-col md:flex-row justify-evenly gap-8">
        <div class="">
          <img src="https://plus.unsplash.com/premium_photo-1661284828052-ea25d6ea94cd?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8d29ya3xlbnwwfHwwfHx8MA%3D%3D"
            alt="Work Image"
            class="w-full md:w-[460px]   rounded-lg shadow-lg" />
        </div>
        <div class="">
          <h1 class="text-2xl font-bold mb-4">What Do We Do?</h1>
          <div class='flex flex-col gap-6'>


            <p class="text-gray-700 ">
              At Zambeel, our goal is to equip individuals and brands with the tools they <br /> need to flourish in the thriving markets of the UAE and KSA.
            </p>
            <p>With strategically positioned warehouses in Sharjah, Jeddah, and Riyadh,<br /> we guarantee efficient and prompt delivery operations.</p>
            <p>With the widest range of drop-shipping options available, we provide <br /> resellers with an unparalleled array of products. Our comprehensive suite <br /> of services covers everything from sourcing goods from local markets in <br /> the UAE and KSA, as well as China, to warehousing, fulfillment, last-mile <br /> delivery, and Cash on Delivery facilities.</p>
            <p>Our extensive network comprises resellers from Pakistan, India, <br />Bangladesh, UAE, KSA, Brazil, and Egypt, all united in their success with <br /> Zambeel.</p>
            <button class='bg-primary-700 hover:bg-primary-600 p-4 text-white rounded-lg self-start'>See Our Video</button>
          </div>
        </div>
      </div>
    </div>

    <div class=" p-8 mt-32 ">
      <div class="flex flex-col md:flex-row justify-evenly gap-8">
        <div class="">
          <h1 class="text-2xl font-bold mb-4">What Do We Do?</h1>
          <div class='flex flex-col gap-6'>
            <p class="text-gray-700 ">
              At Zambeel, our goal is to equip individuals and brands with the tools they <br /> need to flourish in the thriving markets of the UAE and KSA.
            </p>
            <p>With strategically positioned warehouses in Sharjah, Jeddah, and Riyadh,<br /> we guarantee efficient and prompt delivery operations.</p>
            <p>With the widest range of drop-shipping options available, we provide <br /> resellers with an unparalleled array of products. Our comprehensive suite <br /> of services covers everything from sourcing goods from local markets in <br /> the UAE and KSA, as well as China, to warehousing, fulfillment, last-mile <br /> delivery, and Cash on Delivery facilities.</p>
            <p>Our extensive network comprises resellers from Pakistan, India, <br />Bangladesh, UAE, KSA, Brazil, and Egypt, all united in their success with <br /> Zambeel.</p>
            <button class='bg-primary-700 hover:bg-primary-600 text-white p-4 rounded-lg self-start'>Read the artical</button>
          </div>
        </div>
        <div class="">
          <img src="https://plus.unsplash.com/premium_photo-1661284828052-ea25d6ea94cd?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8d29ya3xlbnwwfHwwfHx8MA%3D%3D"
            alt="Work Image"
            class="w-full md:w-[460px]   rounded-lg shadow-lg" />
        </div>
      </div>
    </div>

    <div class='bg-gray-100 py-11'>

      <p class='text-center font-bold text-2xl text-blue-950 py-10'>What Makes Zambeel Unique?</p>
      <div class='grid grid-cols-1 md:grid-cols-3 gap-10 max-w-[1000px] mx-auto  '>


        <div class='flex flex-col gap-4'>

          <div class='flex justify-center items-center'>  <i class='fa-solid fa-dollar text-4xl text-green-400' ></i></div>

          <p class='text-center font-bold text-base'>no need to get business <br />Registration or buy inventroy</p>

        </div>

        <div class='flex flex-col gap-4'>

          <div class='flex justify-center items-center'><i class='fa-solid fa-dollar text-4xl text-green-400' ></i></div>

          <p class='text-center font-bold text-base'>no need to get business <br />Registration or buy inventroy</p>

        </div>
        <div class='flex flex-col gap-4'>

          <div class='flex justify-center items-center'>  <i class='fa-solid fa-dollar text-4xl text-green-400' ></i></div>

          <p class='text-center font-bold text-base'>no need to get business <br />Registration or buy inventroy</p>

        </div>
        <div class='flex flex-col gap-4'>

          <div class='flex justify-center items-center'> <i class='fa-solid fa-dollar text-4xl text-green-400' ></i></div>

          <p class='text-center font-bold text-base'>no need to get business <br />Registration or buy inventroy</p>

        </div>
        <div class='flex flex-col gap-4'>

          <div class='flex justify-center items-center'><i class='fa-solid fa-dollar text-4xl text-green-400' ></i></div>

          <p class='text-center font-bold text-base'>no need to get business <br />Registration or buy inventroy</p>

        </div>
        <div class='flex flex-col gap-4'>

          <div class='flex justify-center items-center'>  <i class='fa-solid fa-dollar text-4xl text-green-400' ></i></div>

          <p class='text-center font-bold text-base'>no need to get business <br />Registration or buy inventroy</p>

        </div>

      </div>

    </div>

    <div class='max-w-[800px] mx-auto my-12'>
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

    </div>
    <div class=' py-11'>

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

    </div>

    <div class='max-w-[800px] mx-auto my-12'>

      <p class='text-center font-bold text-2xl text-primary-600'>Happy Resellers of Zambeel</p>

      <div class='grid grid-cols-2 px-2 md:grid-cols-3 lg:grid-cols-5 gap-5 my-8'>

        <div class=''>
          <div class='border-4 border-yellow-400 '>
            <img src='https://media.istockphoto.com/id/1364917563/photo/businessman-smiling-with-arms-crossed-on-white-background.jpg?s=612x612&w=0&k=20&c=NtM9Wbs1DBiGaiowsxJY6wNCnLf0POa65rYEwnZymrM=' alt="" class='w-full' />
          </div>


          <p class=' my-2 font-bold tracking-tighter'>High Delivery Success</p>

          <p class=' my-2'>Zambeel's reliable shipping has helped me achieve a high delivery ratio Impressed with their operations.</p>
        </div>

        <div class=''>
          <div class='border-4 border-yellow-400 '>
            <img src='https://media.istockphoto.com/id/1364917563/photo/businessman-smiling-with-arms-crossed-on-white-background.jpg?s=612x612&w=0&k=20&c=NtM9Wbs1DBiGaiowsxJY6wNCnLf0POa65rYEwnZymrM=' alt="" class='w-full' />
          </div>


          <p class=' my-2 font-bold tracking-tighter'>High Delivery Success</p>

          <p class=' my-2'>Zambeel's reliable shipping has helped me achieve a high delivery ratio Impressed with their operations.</p>
        </div>
        <div class=''>
          <div class='border-4 border-yellow-400 '>
            <img src='https://media.istockphoto.com/id/1364917563/photo/businessman-smiling-with-arms-crossed-on-white-background.jpg?s=612x612&w=0&k=20&c=NtM9Wbs1DBiGaiowsxJY6wNCnLf0POa65rYEwnZymrM=' alt="" class='w-full' />
          </div>


          <p class=' my-2 font-bold tracking-tighter'>High Delivery Success</p>

          <p class=' my-2'>Zambeel's reliable shipping has helped me achieve a high delivery ratio Impressed with their operations.</p>
        </div>
        <div class=''>
          <div class='border-4 border-yellow-400 '>
            <img src='https://media.istockphoto.com/id/1364917563/photo/businessman-smiling-with-arms-crossed-on-white-background.jpg?s=612x612&w=0&k=20&c=NtM9Wbs1DBiGaiowsxJY6wNCnLf0POa65rYEwnZymrM=' alt="" class='w-full' />
          </div>


          <p class=' my-2 font-bold tracking-tighter'>High Delivery Success</p>

          <p class=' my-2'>Zambeel's reliable shipping has helped me achieve a high delivery ratio Impressed with their operations.</p>
        </div>
        <div class=''>
          <div class='border-4 border-yellow-400 '>
            <img src='https://media.istockphoto.com/id/1364917563/photo/businessman-smiling-with-arms-crossed-on-white-background.jpg?s=612x612&w=0&k=20&c=NtM9Wbs1DBiGaiowsxJY6wNCnLf0POa65rYEwnZymrM=' alt="" class='w-full' />
          </div>

          <p class=' my-2 font-bold tracking-tighter'>High Delivery Success</p>

          <p class=' my-2'>Zambeel's reliable shipping has helped me achieve a high delivery ratio Impressed with their operations.</p>
        </div>
      </div>

    </div>
  </div>

@endsection

@section('scripts')
<script type="module">
  const swiper = new Swiper('.swiper', {
    speed: 400,
    spaceBetween: 100,
  });
</script>
@endsection