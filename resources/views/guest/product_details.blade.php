@extends('layouts.web')
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
                    PKR{{ number_format($product->sale_price, 0, '.', ',') }}
                </div>
                <table class="table-fixed w-full">
                    <tr>
                        <td colspan="2" class="py-4 font-semibold ">{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="py-1 text-sm font-medium flex space-x-2  items-center">
                            <div>
                                {{ $product->category->name }}
                            </div>
                            <div class="h-4 w-0.5 bg-gray-200"></div>
                            <div>
                                {{ $product->sales_count }} slaes
                            </div>
                        </td>
                    </tr>
                    <tr class="">
                        <td>SKU</td>
                        <td class="text-end">{{ $product->sku }}</td>
                    </tr>
                    <tr>
                        <td>Weight</td>
                        <td class="text-end">{{ $product->weight }}g</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end text-primary-500">
                            <a target="__blank" href="{{ route('download.product.image', $product->id) }}">Download
                                Images</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="bg-gray-50 rounded-lg flex-1 p-4">
                <div class="text-lg font-semibold">
                    Some other details
                </div>
                <hr class="py-1">
                <div class="prose ">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae quibusdam ratione, id optio assumenda
                    culpa dignissimos in exercitationem neque placeat laborum eius inventore eum quasi, magnam numquam sit.
                    Eveniet, magnam.
                </div>
            </div>
        </div>
        <br>
        <div>
            <div class="text-lg font-semibold">
                Description
            </div>
            <hr class="py-2">
            <div class="prose min-w-full">
                {!! $product->description !!}

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
