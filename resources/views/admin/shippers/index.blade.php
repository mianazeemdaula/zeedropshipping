@extends('layouts.admin')

@section('content')
<section class="mx-auto w-full max-w-7xl px-4 py-4">
    <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
        <div class="flex items-center justify-between min-w-full">
            <h2 class="text-lg font-semibold">Shippers</h2>
            {{-- <a href="{{ route('admin.shippers.create') }}" class="px-5 text-white bg-black py-2 rounded-lg hover:bg-gray-800" >Create</a> --}}
        </div>
    </div>
    <div class="mt-6 flex flex-col space-y-4">
        <!-- Table Layout for Larger Screens -->
        <div class="">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">Shipper</th>
                                    <th scope="col" class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">Phone</th>
                                    <th scope="col" class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">Status</th>
                                    <th scope="col" class="px-2 py-2 text-left text-xs font-normal text-gray-700 sm:px-4 sm:py-3.5">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @if($shippers->isEmpty())
                                    <tr>
                                        <td class="whitespace nowrap px-2 py-4 text-sm sm:px-4 sm:py-4" colspan="9">No Shippers</td>
                                    </tr>
                                @endif
                                @foreach($shippers as $item)
                                <tr>
                                    <td class="whitespace-nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                        <div class="flex items-center space-x-4">
                                            <img
                                                class="h-10 w-10 rounded-full object-cover"
                                                src="{{ $item->icon }}"
                                                alt="Shiper Image"
                                            />
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $item->name }}
                                                </div>
                                                <div class="text-sm text-gray-700">
                                                    {{ $item->email ?? '' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                        {{ $item->phone }}
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4 text-sm sm:px-4 sm:py-4">
                                        <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                            {{ $item->active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4 text-sm font-medium text-right sm:px-4 sm:py-4 flex">
                                         {{-- <a href="{{ route('admin.shippers.show',$item->id) }}" class="text-gray-700 hover:text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm7.5 0c-.914 3.407-4.104 6-7.5 6s-6.586-2.593-7.5-6c.914-3.407 4.104-6 7.5-6s6.586 2.593 7.5 6z"/>
                                        </svg>
                                    </a> --}}
                                    <a href="{{ route('admin.shippers.edit', $item->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 19h-2a1 1 0 01-1-1v-2a1 1 0 01.293-.707l8.59-8.59a1.5 1.5 0 012.12 0l2.12 2.12a1.5 1.5 0 010 2.12l-8.59 8.59A1 1 0 0111 19z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 17l-3-3m0 0l1-1m-1 1l-1-1m1 1h1.5m3-5.5L14 9m-1 1L11.5 7.5" />
                                        </svg>
                                    </a>
                                    {{-- <a href="http://">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </a> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <x-pagging :paginator=$products /> --}}
    <div class="py-4">
        {{ $shippers->links() }}
    </div>
</section>
@endsection
