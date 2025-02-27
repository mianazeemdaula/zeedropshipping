@extends('layouts.admin')

@section('content')
    <div class="mx-auto">
        <div class="px-4 sm:px-8 md:px-12 bg-white rounded-lg mt-7 pt-2">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-sm relative" role="alert">
                    <strong class="font-bold">Holy smokes!</strong>
                    <span class="block sm:inline">Something seriously bad happened.</span>
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                    <div class="flex flex-col gap-2">
                        <x-label>Name</x-label>
                        <x-input name="name" value="{{ $user->name }}" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Email</x-label>
                        <x-input name="email" value="{{ $user->email }}" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Mobile</x-label>
                        <x-input name="mobile" value="{{ $user->mobile }}" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Role</x-label>
                        <x-select name="role">
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}"
                                    {{ $user->roles->pluck('id')->contains($role->id) ? 'selected' : '' }}>
                                    {{ $role->name }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Comment</x-label>
                        <x-input name="comment" value="{{ $user->comment }}" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Status</x-label>
                        <x-select name="status">
                            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="blocked" {{ $user->status == 'blocked' ? 'selected' : '' }}>Blocked</option>
                            <option value="suspended" {{ $user->status == 'suspended' ? 'selected' : '' }}>Suspended
                            </option>
                            <option value="unverified" {{ $user->status == 'unverified' ? 'selected' : '' }}>Unverified
                            </option>
                            <option value="under-review" {{ $user->status == 'under-review' ? 'selected' : '' }}>Under
                                Review</option>
                        </x-select>
                    </div>

                </div>


                <div class="flex flex-col gap-2 mt-4">
                    <div class="w-20">
                        <img src="{{ $user->avatar }}" alt="" srcset="">
                    </div>
                    <x-label>Avatar</x-label>
                    <x-input type="file" name="avatar" />
                </div>

                <div class="flex py-6 space-x-4">
                    <button type="submit"
                        class="font-poppins py-2 px-4 rounded-md bg-green-500 text-white hover:bg-green-600 cursor-pointer">Update</button>
                    <button type="submit"
                        class="font-poppins py-2 px-4 rounded-md bg-red-500 text-white hover:bg-green-600 cursor-pointer">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
