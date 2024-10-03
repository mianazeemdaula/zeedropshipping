@extends('layouts.web')
@section('content')
    <div class="p-8 bg-white">
        <div class="flex flex-col lg:flex-row">
            <div class="w-8/12 mx-8">
                <div>
                    <img src="{{ $product->image }}" alt="" class="rounded-lg w-full" id="slider-main">
                </div>
                <div class="flex items-center justify-center p-4">
                    <div class="grid grid-cols-4 gap-4 items-center">
                        @foreach ($product->media as $item)
                            <img src="{{ asset($item->file_path) }}" alt="no image" srcset=""
                                class="size-20 object-contain rounded-md cursor-pointer slider-image">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 rounded-lg flex-1 p-4">
                <table class="table-fixed w-full">
                    <tr>
                        <td colspan="2" class="py-4 font-semibold ">{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="py-1 font-medium ">
                            <div>
                                {{ $product->category->name }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td class="text-end">RS.{{ $product->sale_price }}</td>
                    </tr>
                    <tr>
                        <td>SKU</td>
                        <td class="text-end">{{ $product->sku }}</td>
                    </tr>
                    <tr>
                        <td>Weight</td>
                        <td class="text-end">{{ $product->weight }}g</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div>
            <div class="text-lg font-semibold">
                Description
            </div>
            <hr class="py-2">
            <div>
                {{ $product->description }}
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        // slider-image click event
        const sliderImages = document.querySelectorAll('.slider-image');
        sliderImages.forEach((image) => {
            image.addEventListener('click', (e) => {
                const src = e.target.src;
                document.querySelector('#slider-main').src = src;
            });
        });
    </script>
@endsection
