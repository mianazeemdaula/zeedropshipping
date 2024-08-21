@extends('layouts.admin')

@section('content')
<section class="mx-auto w-full px-4 py-4">
    <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
        <div>
            <h2 class="text-lg font-semibold">Orders</h2>
        </div>
    </div>
    <div class="mt-6 flex flex-col">
        <!-- Table Layout for Larger Screens -->
        <div class="">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">Order #</th>
                                    <th scope="col" class="px-12 py-3.5 text-left text-sm font-normal text-gray-700">Products</th>
                                    <th scope="col" class="px-12 py-3.5 text-left text-sm font-normal text-gray-700">Status</th>
                                    <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">City/Zip</th>
                                    <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">Shipping Cost</th>
                                    <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">Total</th>
                                    <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">Extra Note</th>
                                    <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($orders as $item)
                                <tr>
                                    <td class="whitespace-nowrap px-4 py-4">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $item->id ?? '' }}</div>
                                                <div class="text-sm text-gray-700">{{ $item->order_number ?? '' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-12 py-4">
                                        <div class="text-sm text-gray-900">{{ $item->paymentMethod->name ?? '' }}</div>
                                        <p class="text-sm">{{ $item->details()->count() }} products</p>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4">
                                        <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">{{ $item->status }}</span>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-700">{{ $item->city }} ({{ $item->zip }})</td>
                                    <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-700">{{ $item->shipping_cost }}</td>
                                    <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-700">{{ $item->total }}</td>
                                    <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-700">{{ $item->extra_note }}</td>
                                    <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-700 flex items-center space-x-2">
                                        <a href="{{ route('dispatcher.orders.show', $item->id) }}" class="text-gray-700 hover:text-blue-500" aria-label="View details for Order {{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm7.5 0c-.914 3.407-4.104 6-7.5 6s-6.586-2.593-7.5-6c.914-3.407 4.104-6 7.5-6s6.586 2.593 7.5 6z"/>
                                            </svg>
                                        </a>
                                        @if($item->status !== 'open' && $item->status !== 'packed')
                                        <a href="{{ $item->tracking_invoice_url }}" target="__blank" aria-label="Edit Order {{ $item->id }}">
                                            <i class="fa-solid fa-file-pdf"></i>
                                        </a>
                                        @endif
                                        <a href="#" aria-label="Delete Order {{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="1" class="w-5 h-5">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </a>
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
    <x-pagging paginator:$orders />
</section>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Terms of Service
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const modalToggles = document.querySelectorAll('[data-modal-toggle]');
    const modalCloses = document.querySelectorAll('[data-modal-hide]');
    const modal = document.getElementById('default-modal');

    modalToggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        });
    });

    modalCloses.forEach(close => {
        close.addEventListener('click', () => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        });
    });
</script>