@extends('layouts.admin')

@section('content')
<div class="mx-auto">
    <div class="px-4 sm:px-8 md:px-12 bg-white rounded-lg mt-7 pt-2">
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Holy smokes!</strong>
                <span class="block sm:inline">Something seriously bad happened.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                <div class="flex flex-col gap-2">
                    <x-label>Category</x-label>
                    <x-select name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }} >{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                </div>

                <div class="flex flex-col gap-2">
                    <x-label>Name</x-label>
                    <x-input name="name" value="{{ $product->name }}" />
                </div>

                <div class="flex flex-col gap-2">
                    <x-label>Weight (Grams)</x-label>
                    <x-input name="weight" type="number" value="{{ $product->weight }}" />
                </div>

                <div class="flex flex-col gap-2">
                    <x-label>Purchase Price</x-label>
                    <x-input name="purchase_price" value="{{ $product->purchase_price }}" type="number" />
                </div>

                <div class="flex flex-col gap-2">
                    <x-label>Sale Price</x-label>
                    <x-input name="sale_price" value="{{ $product->sale_price }}" type="number" />
                </div>

                <div class="flex flex-col gap-2 ">
                    <x-label>Discount Price</x-label>
                    <x-input name="discount_price" value="{{ $product->discount_price }}" type="number" />
                </div>

                <div class="flex flex-col gap-2 ">
                    <x-label>SKU</x-label>
                    <x-input name="sku" value="{{ $product->sku }}" />
                </div>

                <div class="flex flex-col gap-2 ">
                    <x-label>Low Stock Qty</x-label>
                    <x-input name="low_stock_report" value="{{ $product->low_stock_report }}" type="number" />
                </div>

                <div class="flex flex-col gap-2 ">
                    <x-label>Minimum Order Qty</x-label>
                    <x-input name="min_order_qty" value="{{ $product->min_order_qty }}" type="number" />
                </div>

                <div class="flex flex-col gap-2 ">
                    <x-label>Max Order Qty</x-label>
                    <x-input name="max_order_qty" value="{{ $product->max_order_qty }}" type="number" />
                </div>


                <div class="flex flex-col gap-2 ">
                    <x-label>VAT</x-label>
                    <x-input name="vat" value="{{ $product->vat }}" type="number" />
                </div>

                <div class="flex flex-col gap-2 ">
                    <x-label>Stock</x-label>
                    <x-input name="stock" value="{{ $product->stock }}" type="number" />
                </div>
                <div class="flex flex-col gap-2 ">
                    <x-label>Active</x-label>
                    <input type="checkbox" name="status" id="" checked>
                </div>
            </div>
            <div>
                <x-label>Description</x-label>
                <textarea name="description" id="mytextarea" cols="30" rows="10" class="w-full border border-gray-300 rounded-md p-2">{{ $product->description }}</textarea>
            </div>
            <div>
                <x-label>Image(s)</x-label>
                <input type="file" name="image[]" id="" class="border border-gray-300 rounded-md p-2 w-full" multiple>
            </div>
            <div class="flex py-6 space-x-4">
                <button
                    type="submit"
                    class="font-poppins py-2 px-4 rounded-md bg-green-500 text-white hover:bg-green-600 cursor-pointer"
                >Update Product</button>

                <button
                    type="submit"
                    class="font-poppins py-2 px-4 rounded-md bg-red-500 text-white hover:bg-green-600 cursor-pointer"
                >Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('head')
    {{-- <script src="https://cdn.tiny.cloud/1/kput55tw7sf7m8nadh5lth5ghsdshrjgwfbj9ju8hcdigf4a/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: '#mytextarea'
      });
    </script> --}}
@endsection
