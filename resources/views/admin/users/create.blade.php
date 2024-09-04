@extends('layouts.admin')

@section('content')
    <div class="mx-auto">
        <div class="px-4 sm:px-8 md:px-12 bg-white rounded-lg mt-7 pt-2">
            <h5 class="text-lg font-semibold">Create User</h5>
            <p class="mb-4">This is a form to create a new user.</p>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Holy smokes!</strong>
                    <span class="block sm:inline">Something seriously bad happened.</span>
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                    <div class="flex flex-col gap-2">
                        <x-label>Name</x-label>
                        <x-input name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Email</x-label>
                        <x-input name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Mobile</x-label>
                        <x-input name="mobile" value="{{ old('mobile') }}" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Role</x-label>
                        <x-select name="role">
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Password</x-label>
                        <x-input name="password" value="{{ old('password') }}" type="password" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Status</x-label>
                        <x-select name="status">
                            <option value="active">Active</option>
                            <option value="blocked">Blocked</option>
                            <option value="suspended">Suspended
                            </option>
                            <option value="unverified">Unverified
                            </option>
                            <option value="under-review">Under
                                Review</option>
                        </x-select>
                    </div>

                </div>


                <div class="flex flex-col gap-2 mt-4">
                    <div class="w-20">
                        <img src="{{ old('avatar') }}" alt="" srcset="">
                    </div>
                    <x-label>Avatar</x-label>
                    <x-input type="file" name="avatar" />
                </div>

                <div class="flex py-6 space-x-4">
                    <button type="submit"
                        class="font-poppins py-2 px-4 rounded-md bg-green-500 text-white hover:bg-green-600 cursor-pointer">Create</button>
                    <button type="submit"
                        class="font-poppins py-2 px-4 rounded-md bg-red-500 text-white hover:bg-green-600 cursor-pointer">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
