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
        <form action="{{ route('vendor.bank-account.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                <div class="flex flex-col gap-2">
                    <x-label>Bank Name</x-label>
                    <x-select name="bank_id">
                        @foreach($banks as $bank)
                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="flex flex-col gap-2">
                    <x-label>Account Name</x-label>
                    <x-input name="account_name" value="{{ old('account_name') }}" />
                </div>
                <div class="flex flex-col gap-2">
                    <x-label>Account Number (IBAN)</x-label>
                    <x-input name="iban" value="{{ old('iban') }}" />
                </div>

                <div class="flex flex-col gap-2">
                    <x-label>Default</x-label>
                    <input type="checkbox" name="is_default" checked>
                </div>
            </div>
            
            <div class="flex py-6 space-x-4">
                <button type="submit" class="font-poppins py-2 px-4 rounded-md bg-green-500 text-white hover:bg-green-600 cursor-pointer"
                >Create</button>
                <button
                    type="submit"
                    class="font-poppins py-2 px-4 rounded-md bg-red-500 text-white hover:bg-green-600 cursor-pointer"
                >Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection
