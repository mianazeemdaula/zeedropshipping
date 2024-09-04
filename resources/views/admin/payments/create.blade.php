@extends('layouts.admin')

@section('content')
    <div class="mx-auto">
        <div class="px-4 sm:px-8 md:px-12 bg-white rounded-lg mt-7 pt-2">
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
            <form action="{{ route('admin.payments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                    <div class="flex flex-col gap-2">
                        <x-label>Bank Name</x-label>
                        <x-select name="dropshipper">
                            <option value="">Select Dropshipper</option>
                            @foreach ($vendors as $dropshipper)
                                <option value="{{ $dropshipper->id }}">{{ $dropshipper->name }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Amount</x-label>
                        <x-input name="amount" value="{{ old('amount') }}" type="number" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Deduction</x-label>
                        <x-input name="deduction" value="{{ old('deduction') }}" type="number" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Payment Date</x-label>
                        <x-input name="payment_date" value="{{ old('payment_date') ?? date('Y-m-d') }}" type="date" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Payment Method</x-label>
                        <x-select name="payment_method">
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                        </x-select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Reference</x-label>
                        <x-input name="reference" value="{{ old('reference') }}" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Attachment</x-label>
                        <x-input name="attachment" type="file" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Notes</x-label>
                        <x-input name="note" value="{{ old('note') }}" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Bank Account Title</x-label>
                        <x-input name="bank_title" value="{{ old('bank_title') }}" readonly />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Bank Account</x-label>
                        <x-input name="bank_iban" value="{{ old('bank_iban') }}" readonly />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-label>Pending Orders</x-label>
                        <div id="pending_orders" class="flex items-center justify-start gap-2">
                        </div>
                    </div>
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

@section('js')
    <script type="module">
        const dropshipper = document.querySelector('#dropshipper');
        $('#dropshipper').on('change', function() {
            const selected = $(this).find('option:selected');
            const id = selected.val();
            const name = selected.text();
            console.log(id, name);
            axios.post('/api/dropshipper-pending-payment-info', {
                id: id,
            }).then(response => {
                console.log(response.data);
                $('#amount').val(response.data.pending_payment);
                $('#bank_iban').val(response.data.bank_info.iban);
                $('#bank_title').val(response.data.bank_info.account_name);
                // make checkboxs with order ids
                $('#pending_orders').html('');
                response.data.pending_order_ids.forEach(order => {
                    $('#pending_orders').append(`
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="orderids[]" checked value="${order}" class="form-checkbox h-5 w-5 text-green-600">
                            <span>${order}</span>
                        </div>
                    `);
                });
            }).catch(error => {
                console.log(error);
            });
        });
    </script>
@endsection
