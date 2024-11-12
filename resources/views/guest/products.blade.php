@extends('layouts.web')
@section('content')
    <form action="{{ url('/products') }}" method="post" class="p-8">
        @csrf
        <div class="flex flex-col md:space-x-4 md:flex-row space-y-4 md:space-y-0">
            <div class="bg-white p-4 rounded-lg max-h-[700px]">
                <div class="container mx-auto flex gap-8 items-center justify-between">
                    <h1 class="text-sm font-medium">Product Filtring</h1>
                </div>
                <aside class="">
                    <div class="py-4">
                        <h2 class="text-base font-medium">Search</h2>
                        <input type="text" name="search" value="{{ request()->search }}"
                            class="w-64 border text-gray-700  p-2 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out"
                            placeholder="Search" />

                        <h2 class="text-base font-medium mt-4">Sorting</h2>
                        <select name="sort" id="sort"
                            class="w-64 border text-gray-700  p-2 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
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
                    <h2 class="text-base font-medium">Categories</h2>
                    @foreach ($categoreis as $item)
                        <div class="flex items-center">
                            <input type="checkbox" class="size-3" name="cats[{{ $item->id }}]"
                                @if (request()->cats && collect(array_keys(request()->cats))->contains($item->id)) checked @endif />
                            <label htmlFor="ksa-only" class="ml-2">
                                {{ $item->name }}
                            </label>
                            <span class="ml-4 text-gray-500">{{ $item->products->count() }}</span>
                        </div>
                    @endforeach

                    <h2 class="text-lg font-bold mt-6 mb-2">Price</h2>
                    <div class="flex gap-2">
                        <input type="number" name="from_price" value="{{ request()->from_price }}"
                            class="p-2 w-32 border hover:bg-white rounded-lg bg-custom-gray" placeholder="From" />
                        <input type="number" name="to_price" value="{{ request()->to_price }}"
                            class="p-2 w-32 border  hover:bg-white  rounded-lg bg-custom-gray" placeholder="To" />
                    </div>
                    <button type="submit"
                        class="bg-primary-600 text-white px-4 py-2 rounded-lg mt-4 hover:bg-primary-700 duration-200 w-64">Filter</button>

                </aside>
            </div>
            <div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ($products as $item)
                        <div class="delay-[{{ $item->index + 1 }}00ms] duration-[800ms] taos:translate-y-[-100px] taos:opacity-0"
                            data-taos-offset="200">
                            <div class="delay-[{{ $item->index + 1 }}00ms] duration-[800ms] taos:translate-y-[-100px] taos:opacity-0"
                                data-taos-offset="200">
                                <x-product-card :item="$item" :sku="true"></x-product-card>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="py-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </form>
@endsection
