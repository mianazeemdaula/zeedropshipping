@extends('layouts.web')
@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="container mx-auto flex gap-8 items-center justify-between">
          <h1 class="text-xl font-bold">Product Listing</h1>
          <div class="w-1/2">
            <div class="flex items-center justify-end">
              <select class="border text-gray-700 font-bold p-2 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                <option value="price_low_to_high">Price, low to high</option>
                <option value="price_high_to_low">Price, high to low</option>
                <option value="newest">Newest</option>
                <option value="oldest">Oldest</option>
                <option value="best_selling">Best Selling</option>
                <option value="rating">Rating</option>
              </select>
            </div>
          </div>
        </div>


        <main class="container mx-auto mt-8 flex flex-col lg:flex-row">
          <aside class="lg:w-1/4 w-full mb-8 flex flex-col gap-1 lg:mb-0 lg:pr-8 mt-8">
            <h2 class="text-lg font-bold mb-2">Categories</h2>
            @foreach ($categoreis as $item)    
              <div class="flex items-center">
                <input type="checkbox" class="size-3" id="" />
                <label htmlFor="ksa-only" class="ml-2">
                  {{ $item->name }}
                </label>
                <span class="ml-4 text-gray-500">{{ $item->products->count() }}</span>
              </div>
            @endforeach
            
            <h2 class="text-lg font-bold mt-6 mb-2">Price</h2>
            <div class="mb-2 flex ">
              <span class="text-gray-500">
                The highest price is {{ 500 }} PKR
              </span>
              <button class="text-sm underline ml-4 hover:no-underline">
                RESET
              </button>
            </div>
            <div class="flex gap-2">
              <input type="number"
                class="p-2 w-32 outline-none hover:border hover:bg-white rounded-lg bg-custom-gray"
                placeholder="From" />
              <input type="number"
                class="p-2 w-32 outline-none hover:border hover:bg-white  rounded-lg bg-custom-gray"
                placeholder="To" />
            </div>
          </aside>
          <div class="lg:w-3/4 w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach([1,2,3,4,5,6,7,8,9,10] as $product)
              <div class="">
                <div class="hover:underline">
                  <img
                    src="https://cdn.shopify.com/s/files/1/0777/4122/8329/files/autos-led-bulb-453217.jpg?v=1717145495"
                    alt="Product"
                    class="w-full h-42 object-covertransition-transform duration-300 ease-in-out transform hover:scale-105"
                  />
                  <h3 class="text-sm text-center font-bold mb-2 text-custom-blue">
                    Autos Led Bulb
                  </h3>
                </div>
                <p class="text-sm text-center">PKR 1250</p>
                <p class="text-sm text-center">SKU-20-5656A2</p>
              </div>
            @endforeach
          </div>
        </main>
      </div>
@endsection