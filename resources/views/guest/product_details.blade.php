@extends('layouts.web')
@section('title', "{$product->name} | Zeedropshipping")
@section('content')
    <div class="p-8 bg-white">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-2">
            <div class="flex items-center justify-center">
                <div class="exzoom">
                    <div class="exzoom_img_box">
                        <ul class="exzoom_img_ul">
                            @foreach ($product->media as $item)
                                <li> <img src="{{ asset($item->file_path) }}" alt="no image" srcset=""
                                        class="slider-image">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="exzoom_nav"></div>
                </div>
            </div>
            <div class="bg-gray-50 rounded-lg flex-1 p-4">
                <div class="text-2xl font-bold">
                    PKR-{{ number_format($product->sale_price, 0, '.', ',') }}
                </div>
                <div>
                    <div class="py-4 font-semibold ">{{ $product->name }}</div>
                </div>
                <div class="flex items-center my-2 space-x-1">
                    @foreach ($product->categories as $item)
                        <div class="bg-primary-50 text-center px-2 py-1 rounded-md">
                            {{ $item->name }}
                        </div>
                    @endforeach
                </div>
                <table class="table-fixed w-full">
                    <tr class="">
                        <td>SKU</td>
                        <td class="text-end font-semibold">{{ $product->sku }}</td>
                    </tr>
                    <tr>
                        <td>Weight</td>
                        <td class="text-end font-semibold">{{ $product->weight }}g</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end text-primary-500">
                            <a target="__blank" href="{{ route('download.product.image', $product->id) }}">Download
                                Images</a>
                        </td>
                    </tr>
                </table>
                <div class="text-sm mt-4">
                    <a href="https://wa.me/923159999547" class="text-white bg-primary-500 px-4 py-2 rounded-sm"
                        target="_blank" rel="noopener noreferrer">Confirm Stock</a>
                    <div class="mt-2"> Before running a paid campaign, please confirm the stock availability</div>
                </div>
            </div>
            <div class="bg-gray-50 rounded-lg flex-1 p-4">
                <div class="text-lg font-semibold">
                    Description
                </div>
                <hr class="py-1">
                <div class="prose ">
                    {!! $product->description !!}
                </div>
            </div>
        </div>
        <br>
        <div>
            <div class="prose min-w-full">
                <div>
                    @foreach ($product->media as $item)
                        <img src="{{ asset($item->file_path) }}" alt="" srcset="" class="">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="module">
        // import exzoom
        import "{{ asset('assets/jquery.exzoom.js') }}";
        // slider-image click event
        const sliderImages = document.querySelectorAll('.slider-image');
        sliderImages.forEach((image) => {
            image.addEventListener('click', (e) => {
                const src = e.target.src;
                document.querySelector('#slider-main').src = src;
            });
        });

        // document ready
        $(document).ready(function() {
            $(".exzoom").exzoom({});
        });
    </script>
@endsection
