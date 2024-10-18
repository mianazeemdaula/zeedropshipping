@extends('layouts.admin')

@section('content')
    <section class="mx-auto w-full px-4 py-4">
        <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
            <div>
                <h2 class="text-lg font-semibold">Orders</h2>
            </div>
            <div class="">
                {{-- <form action="{{ route('dispatcher.print.order.label') }}" method="post"> --}}
                {{-- @csrf
            <input type="hidden" name="order_ids" id="order_ids"> --}}
                <button class="bg-primary-500 text-white px-4 py-1 rounded-md" id="downloadsheet">Track Sheet</button>
                <button class="bg-secondary-500 text-white px-4 py-1 rounded-md" id="downloadstock">Stock Sheet</button>
                {{-- </form> --}}
            </div>
        </div>
        <form action="{{ route('dispatcher.orders.store') }}" method="post" class="mt-4">
            @csrf
            <div class="flex items-center justify-between">
                <div class="flex space-x-2">
                    <div>
                        <x-label>Date</x-label>
                        <input type="date" name="start_date" id="" class="p-1 rounded-md"
                            value="{{ $start_date ?? date('Y-m-d') }}">
                    </div>
                    <div>
                        <input type="date" name="end_date" id="" class="p-1 rounded-md"
                            value="{{ $end_date ?? date('Y-m-d') }}">
                    </div>
                    <div>
                        <input type="text" name="sku" id="" class="p-1 rounded-md"
                            placeholder="Enter SKU if any" value="{{ $sku ?? '' }}">
                    </div>
                </div>
                <div>
                    <button class="bg-primary-500 text-white px-4 py-1 rounded-md">Filter</button>
                </div>
            </div>
        </form>

        <div class="mt-6 flex flex-col">
            <!-- Table Layout for Larger Screens -->
            <div class="">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">
                                            <input type="checkbox" name="orderidsall">
                                        </th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">
                                            Order #</th>
                                        <th scope="col" class="px-12 py-3.5 text-left text-sm font-normal text-gray-700">
                                            Products</th>
                                        <th scope="col" class="px-12 py-3.5 text-left text-sm font-normal text-gray-700">
                                            Status</th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">
                                            City</th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">
                                            Total</th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">
                                            Extra Note</th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">
                                            Tracking</th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal text-gray-700">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @if ($orders->count() == 0)
                                        <tr>
                                            <td colspan="9" class="text-center py-1">No Orders Found</td>
                                        </tr>
                                    @endif
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td class="whitespace-nowrap px-4 py-1"><input type="checkbox"
                                                    name="checkorderIds" value="{{ $item->id }}" class="order-id"></td>
                                            <td class="whitespace-nowrap px-4 py-1">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">{{ $item->id ?? '' }}
                                                        </div>
                                                        <div class="text-sm text-gray-700">{{ $item->order_number ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-normal px-4 py-1 line-clamp-2">
                                                @if ($item->details)
                                                    {{ $item->details()->first()->product->name }}
                                                    @if ($item->details->count() > 1)
                                                        <span
                                                            class="text-sm text-gray-700">+{{ $item->details->count() - 1 }}</span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-1">
                                                <x-status-chip :status="$item->status" />
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-1 text-sm text-gray-700">
                                                {{ $item->city }}</td>
                                            <td class="whitespace-nowrap px-4 py-1 text-sm text-gray-700">
                                                {{ $item->total }}</td>
                                            <td class="whitespace-nowrap px-4 py-1 text-sm text-gray-700">
                                                {{ $item->extra_note }}</td>
                                            <td class="whitespace-nowrap px-4 py-1 text-xs text-gray-700">
                                                @if ($item->track_data)
                                                    <a class="text-blue-500" target="_blank"
                                                        href="https://digidokaan.pk/real-time-tracking?t_id={{ $item->track_data['tracking_no'] ?? '0' }}">
                                                        Track
                                                    </a>
                                                @endif
                                            </td>
                                            <td
                                                class="whitespace-nowrap px-4 py-1 text-sm text-gray-700 flex items-center space-x-2">
                                                <a href="{{ route('dispatcher.orders.show', $item->id) }}"
                                                    class="text-gray-700 hover:text-blue-500"
                                                    aria-label="View details for Order {{ $item->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                                                        <path strokeLinecap="round" strokeLinejoin="round"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm7.5 0c-.914 3.407-4.104 6-7.5 6s-6.586-2.593-7.5-6c.914-3.407 4.104-6 7.5-6s6.586 2.593 7.5 6z" />
                                                    </svg>
                                                </a>
                                                @if (!in_array($item->status, ['open', 'cancelled', 'packed']) && $item->track_data)
                                                    <a href="{{ $item->track_data['invoice_url'] }}" target="__blank"
                                                        aria-label="Edit Order {{ $item->id }}">
                                                        <i class="fa-solid fa-file-pdf"></i>
                                                    </a>
                                                @endif
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
@endsection

@section('js')
    <script type="module">
        var orderIds = [];

        const csvmaker = function(data) {
            // Empty array for storing the values
            var csvRows = [];
            // Headers is basically a keys of an object which 
            // is id, name, and profession
            const headers = Object.keys(data[0]);
            // As for making csv format, headers must be
            // separated by comma and pushing it into array
            csvRows.push(headers.join(','));
            // Pushing Object values into the array with
            // Looping through the data values and make
            // sure to align values with respect to headers
            for (const row of data) {
                const values = headers.map(e => {
                    return row[e]
                })
                csvRows.push(values.join(','))
            }
            // returning the array joining with new line 
            return csvRows.join('\n')
        }
        // jquery for check all checkboxes
        $('input[name="orderidsall"]').on('change', function() {
            if (jQuery(this).is(':checked')) {
                jQuery('input[name="checkorderIds"]').each(function() {
                    jQuery(this).prop('checked', true);
                    orderIds.push($(this).val());
                });
            } else {
                jQuery('input[name="checkorderIds"]').each(function() {
                    $(this).prop('checked', false);
                    orderIds = [];
                });
            }
        });

        // jquery for check single checkbox
        $('input[name="checkorderIds"]').on('change', function() {
            if (jQuery(this).is(':checked')) {
                orderIds.push($(this).val());
            } else {
                orderIds = orderIds.filter(function(item) {
                    return item != $(this).val();
                });
            }
        });

        $('#downloadsheet').on('click', function() {
            if (orderIds.length == 0) {
                alert('Please select atleast one order');
                return;
            }
            axios({
                method: 'post',
                url: '{{ route('dispatcher.print.order.label') }}',
                data: {
                    order_ids: orderIds
                }
            }).then(function(response) {
                if (response.data && response.data.links.length > 0) {
                    // open the each link in new tab
                    response.data.links.forEach(function(link) {
                        window.open(link, '_blank');
                        // wait for 1 second before opening next tab
                        setTimeout(function() {}, 1000);
                    });
                }
            }).catch(function(error) {
                console.log(error);
                alert(error.response.data.message);
            });
        });

        $('#downloadstock').on('click', function() {
            if (orderIds.length == 0) {
                alert('Please select atleast one order');
                return;
            }
            axios({
                method: 'post',
                url: '{{ route('dispatcher.print.order.stock') }}',
                data: {
                    order_ids: orderIds
                },
                config: {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            }).then(function(response) {
                console.log(response.data.rows);
                // write a csv file and download
                var blob = new Blob([csvmaker(response.data.rows)], {
                    type: 'text/csv'
                });
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = 'download.csv';
                // Trigger the download by clicking the anchor tag
                a.click();
            }).catch(function(error) {
                console.log(error);
                alert(error.message);
            });
        });
    </script>
@endsection
