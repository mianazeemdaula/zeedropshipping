@extends('layouts.web')
@section('content')
    <form action="{{ url('/products') }}" method="post">
        @csrf
        <div class="max-w-6xl mx-auto px-4 py-8">
            <div class="container mx-auto flex gap-8 items-center justify-between">
                <h1 class="text-xl">Product Listing</h1>
            </div>

            <main class="container mx-auto mt-8 flex flex-col lg:flex-row">
                <aside class="lg:w-1/4 w-full mb-8 flex flex-col gap-1 lg:mb-0 lg:pr-8 mt-8">
                    <div class="pb-4">
                        <h2 class="text-lg mb-2">Sorting</h2>
                        <select name="sort" id="sort"
                            class="border text-gray-700  p-2 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                            <option value="price_low_to_high" @if (request()->sort == 'price_low_to_high') selected @endif>Price, low
                                to high</option>
                            <option value="price_high_to_low" @if (request()->sort == 'price_high_to_low') selected @endif>Price, high
                                to low</option>
                            <option value="newest" @if (request()->sort == 'newest') selected @endif>Newest</option>
                            <option value="oldest" @if (request()->sort == 'oldest') selected @endif>Oldest</option>
                            <option value="best_selling"@if (request()->sort == 'best_selling') selected @endif>Best Selling
                            </option>
                        </select>
                    </div>
                    <h2 class="text-lg mb-2">Categories</h2>
                    @foreach ($categoreis as $item)
                        <div class="flex items-center">
                            <input type="checkbox" class="size-3" name="cats[{{ $item->id }}]" />
                            <label htmlFor="ksa-only" class="ml-2">
                                {{ $item->name }}
                            </label>
                            <span class="ml-4 text-gray-500">{{ $item->products->count() }}</span>
                        </div>
                    @endforeach

                    <h2 class="text-lg font-bold mt-6 mb-2">Price</h2>
                    {{-- <div class="mb-2 flex ">
                        <span class="text-gray-500">
                            The highest price is {{ 500 }} PKR
                        </span>
                        <button class="text-sm underline ml-4 hover:no-underline">
                            RESET
                        </button>
                    </div> --}}
                    <div class="flex gap-2">
                        <input type="number" name="from_price" value="{{ request()->from_price }}"
                            class="p-2 w-32 outline-none hover:border hover:bg-white rounded-lg bg-custom-gray"
                            placeholder="From" />
                        <input type="number" name="to_price" value="{{ request()->to_price }}"
                            class="p-2 w-32 outline-none hover:border hover:bg-white  rounded-lg bg-custom-gray"
                            placeholder="To" />
                    </div>
                    <button type="submit"
                        class="bg-primary-600 text-white px-4 py-2 rounded-lg mt-4 hover:bg-primary-700 duration-200">Filter</button>

                </aside>
                <div class="lg:w-3/4 w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($products as $item)
                        <div class="delay-[{{ $item->index + 1 }}00ms] duration-[800ms] taos:translate-y-[-100px] taos:opacity-0"
                            data-taos-offset="200">
                            <div class="delay-[{{ $item->index + 1 }}00ms] duration-[800ms] taos:translate-y-[-100px] taos:opacity-0"
                                data-taos-offset="200">
                                <x-product-card :item="$item"></x-product-card>
                            </div>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
    </form>
@endsection
