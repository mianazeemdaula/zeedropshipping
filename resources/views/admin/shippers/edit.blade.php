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
        <form action="{{ route('admin.shippers.update', $shipper->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">

                <div class="flex flex-col gap-2">
                    <x-label>Name</x-label>
                    <x-input name="name" value="{{ $shipper->name }}" />
                </div>

                <div class="flex flex-col gap-2">
                    <x-label>Email</x-label>
                    <x-input name="email" type="email" value="{{ $shipper->email }}" />
                </div>

                <div class="flex flex-col gap-2">
                    <x-label>Phone</x-label>
                    <x-input name="phone" value="{{ $shipper->phone }}" type="text" />
                </div>
                @foreach ($shipper->config ?? [] as $key => $value)
                <div class="flex flex-col gap-2">
                    <x-label>{{ ucFirst($key) }}</x-label>
                    <x-input name="config[{{$key}}]" value="{{ $value }}"  />
                </div>
                @endforeach
                    

                <div class="flex flex-col gap-2 ">
                    <x-label>Tracking URL</x-label>
                    <x-input name="tracking_url" value="{{ $shipper->tracking_url }}" type="url" />
                </div>

                <div class="flex flex-col gap-2 ">
                    <x-label>Active</x-label>
                    <input type="checkbox" name="active" id="" checked>
                </div>
            </div>
            {{-- <div>
                <x-label>Image(s)</x-label>
                <input type="file" name="image[]" id="" class="border border-gray-300 rounded-md p-2 w-full" multiple>
            </div> --}}
            <div class="flex py-6 space-x-4">
                <button
                    type="submit"
                    class="font-poppins py-2 px-4 rounded-md bg-green-500 text-white hover:bg-green-600 cursor-pointer"
                >Update Shipper</button>

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
