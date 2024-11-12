@extends('layouts.web')
@section('title', 'Policies | Zeedropshipping')
@section('content')
    <div class="p-8 my-4 md:p-4 lg:p-4">
        <x-web-content-section title="Delivery Charges and Packing Costs" image="{{ asset('assets/images/policies.png') }}"
            height="h-[550px]">
            <p class="text-sm py-4 font-semibold">
                Delivery charges and packing costs are structured as follows:
            </p>
            <ol class="">
                <li>
                    <div class="py-1 text-sm">
                        <div class="font-bold text-primary-500">1. For Products Up to 1 kg:</div>
                    </div>
                </li>
                <ul class="list-disc list-inside indent-4 my-1 text-sm">
                    <li>
                        <strong>Delivery Charges:</strong> Rs.180/-
                    </li>
                    <li>
                        <strong>Packing Charges:</strong> Rs.30/-
                    </li>
                    <li>
                        <strong>Total Charges:</strong> Rs.210/-
                    </li>
                </ul>
                <li>
                    <div class="py-1 text-sm">
                        <div class="font-bold text-primary-500">2. For Products Over 1 kg</div>
                    </div>
                </li>
                <ul class="list-disc list-inside  indent-4 my-1 text-sm">
                    <li>
                        <strong>Delivery Charges:</strong> Will vary based on the weight.
                    </li>
                    <li>
                        <strong>Packing Charges:</strong> Rs.40/-
                    </li>
                    <li class="">
                        <strong>Example:</strong> For a product weighing 2 kg, specific delivery charges will apply based on
                        the logistics provider.
                    </li>
                </ul>
            </ol>
            <div class="py-1 text-sm">
                <div class="font-bold text-primary-500">Additional Information:</div>
            </div>
            <ul class="list-disc list-inside  indent-4 my-1 text-sm">
                <li>
                    These delivery charges are separate from your selling price or COD price
                </li>
                <li>
                    In case of product delivery failure, a fee of Rs. 75/- will be deducted from your profit for return
                    handling, which is separate from the delivery charges.
                </li>
            </ul>
        </x-web-content-section>

        <div class="my-2">
            <hr size="2" width="100%" />
        </div>
        <x-web-content-section title="Profit Payment Policy" revers="true"
            image="{{ asset('assets/images/policies1.jpg') }}">
            <p class="text-sm my-2">
                At Zee Dropshipping, we are committed to providing timely payments to our dropshippers. Here’s how our
                payment system works:
            </p>
            <ol class="text-sm">
                <li>
                    <div class="py-1 text-sm">
                        <div class="font-bold text-primary-500">1. Standard Payment Schedule:</div>
                    </div>
                </li>
                <ul class="list-disc list-inside  indent-4 my-2 text-sm">
                    <li>
                        Payments are processed every Monday.
                    </li>
                    <li>
                        For accurate distribution of profit, it is essential to provide the correct title of your account,
                        account number, or IBAN number
                    </li>
                </ul>
                <li>
                    <div class="py-1 text-sm">
                        <div class="font-bold text-primary-500">2. Enhanced Payment Schedule:</div>
                    </div>
                </li>
                <ul class="list-disc list-inside  indent-4 my-3">
                    <li>
                        Dropshippers with more than 100 orders delivered daily will receive payments twice a week, on
                        Tuesdays and Mondays.
                    </li>
                    <li>
                        Payments are transferred through banking channels for secure transactions.
                    </li>
                </ul>
                <p>
                    <strong>Important Notes:</strong>
                </p>
                <ul class="list-disc list-inside  indent-4 my-3">
                    <li>
                        Payments are calculated based on delivered orders and processed in accordance with our payment
                        policy
                    </li>
                    <li>
                        Ensure that all orders are correctly processed and delivered to be eligible for payments.
                    </li>
                </ul>
            </ol>
        </x-web-content-section>
        <div class="my-2">
            <hr size="2" width="100%" />
        </div>
        <x-web-content-section title="Refund/Complaint Handling Policy" image="{{ asset('assets/images/policies2.jpg') }}">
            <p class="text-sm py-4">
                At Zee Dropshipping, we prioritize customer satisfaction. If a customer receives an incorrect, broken, or
                damaged item, we will arrange for an exchange delivery. Please follow these steps to file a complaint:
            </p>
            <p class="text-lg my-1 text-primary-500">
                <strong>How to File a Complaint:</strong>
            </p>
            <ol class="text-sm">
                <li>
                    <div class="py-1 text-sm">
                        <div class="font-bold text-primary-500">1. Claim Submission:</div>
                    </div>
                </li>
                <ul class="list-disc list-inside  indent-4 my-1">
                    <li>
                        Claims must be submitted within 48 hours of delivery
                    </li>
                    <li>
                        To initiate a claim, please call our customer support
                    </li>
                    <li>
                        Ensure you have video proof showcasing the issue, as verbal claims will not be accepted.
                    </li>
                </ul>
                <li>
                    <div class="py-1 text-sm">
                        <div class="font-bold text-primary-500">2. Process:</div>
                    </div>
                </li>
                <ul class="list-disc list-inside  indent-4 my-1">
                    <li>
                        Call our support team.
                    </li>
                    <li>
                        Provide detailed information about the issue and share the video proof.
                    </li>
                    <li>
                        Our support team will assist you in the process and arrange for an exchange delivery if needed
                    </li>
                </ul>
                <p>
                <div class="py-1 text-sm">
                    <div class="font-bold text-primary-500">Proof and Timeline:</div>
                </div>
                </p>
                <ul class="list-disc list-inside  indent-4 my-3">
                    <li>
                        <strong>Video Proof:</strong> Video evidence demonstrating the fault is mandatory. Verbal complaints
                        or written descriptions alone will not suffice.
                    </li>
                    <li>
                        <strong>Timely Claims:</strong> Claims must be made within 48 hours of receiving the parcel. Claims
                        submitted after this timeframe will not be considered.
                    </li>
                </ul>
            </ol>
        </x-web-content-section>
    </div>
@endsection
