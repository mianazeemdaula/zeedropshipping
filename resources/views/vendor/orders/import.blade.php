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
        <div>
            <h1 class="text-xl font-bold py-4">Import Orders (CSV FILE)</h1>
        </div>
        <form action="{{ url('vendor/orders-import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="provider" value="shopify">
            <div>
                <x-label>CSV</x-label>
                <input type="file" name="file" id="" class="border border-gray-300 rounded-md p-2 w-full">
            </div>
            <div class="flex py-6 space-x-4">
                <button type="submit" class="font-poppins py-2 px-4 rounded-md bg-green-500 text-white hover:bg-green-600 cursor-pointer"
                >Import</button>
                <button
                    type="submit"
                    class="font-poppins py-2 px-4 rounded-md bg-red-500 text-white hover:bg-green-600 cursor-pointer"
                >Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection
