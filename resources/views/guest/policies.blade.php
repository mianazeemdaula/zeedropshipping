@extends('layouts.web')
@section('content')
    <div class="p-8 my-4 md:p-4 lg:p-4">
        <p class="text-2xl my-2 text-primary-500">
            <strong>Courier Charges Policy</strong>
        </p>

        <x-web-content-section title="Delivery Charges and Packing Costs">
            <p class="text-sm py-4">
                Delivery charges are calculated based on the wholesale price of the order
                and packing costs. Below is the breakdown:
            </p>
            <ol class="">
                <li>
                    <div class="py-1 text-sm">
                        <i class="font-bold text-primary-500">1. For Orders Up to Rs.1800/-</i>
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
                        <i class="font-bold text-primary-500">2. For Orders Exceeding Rs.1800/- and Up to Rs.5000/-</i>
                    </div>
                </li>
                <ul class="list-disc list-inside  indent-4 my-1 text-sm">
                    <li>
                        <strong>Delivery Charges:</strong> 10% of the total wholesale
                        amount
                    </li>
                    <li>
                        <strong>Packing Charges:</strong> Rs.30/-
                    </li>
                    <li class="">
                        <strong>Example:</strong> For an order of Rs.2500/-, delivery
                        charges will be Rs.250/-, plus packing charges of Rs.30/-,
                        totaling Rs.280/-
                    </li>
                </ul>
                <li>
                    <div class="py-1 text-sm">
                        <i class="font-bold text-primary-500">3. For Orders Over Rs.5000/-</i>
                    </div>

                </li>
                <ul class="list-disc list-inside  indent-4 my-1 text-sm">
                    <li>
                        <strong>Delivery Charges:</strong> 5% of the total wholesale
                        amount
                    </li>
                    <li>
                        <strong>Packing Charges:</strong> Rs.30/-
                    </li>
                    <li>
                        <strong>Example:</strong> For an order of Rs.6000/-, delivery
                        charges will be Rs.300/-, plus packing charges of Rs.30/-,
                        totaling Rs.330/-
                    </li>
                </ul>
            </ol>
            <div class="py-1 text-sm">
                <i class="font-bold text-primary-500">Additional Information:</i>
            </div>
            <ul class="list-disc list-inside  indent-4 my-1 text-sm">
                <li>
                    These delivery charges are separate from your selling price or COD
                    price.
                </li>
                <li>
                    In case of failed or returned deliveries, a fee of Rs.250/- will
                    be deducted from your profit. This deduction will be made during
                    your profit payment process.
                </li>
            </ul>
        </x-web-content-section>

        <div class="my-2">
            <hr size="2" width="100%" />
        </div>
        <x-web-content-section title="Profit Payment Policy" revers="true">
            <p class="text-sm my-2">
                At Zee Dropshipping, we are committed to providing timely payments to our
                Dropshippers. Here’s how our payment system works:
            </p>
            <ol class="text-sm">
                <li>
                    <div class="py-1 text-sm">
                        <i class="font-bold text-primary-500">1. Standard Payment Schedule:</i>
                    </div>
                </li>
                <ul class="list-disc list-inside  indent-4 my-2 text-sm">
                    <li>
                        Payments are made twice a week.
                    </li>
                    <li>
                        <strong>Standard Payment:</strong> Processed every Friday.
                    </li>
                </ul>
                <li>
                    <div class="py-1 text-sm">
                        <i class="font-bold text-primary-500">2. Enhanced Payment Schedule:</i>
                    </div>
                </li>
                <ul class="list-disc list-inside  indent-4 my-3">
                    <li>
                        Dropshippers with more than 30 orders delivered daily will receive
                        an additional payment on Wednesdays.
                    </li>
                </ul>
                <p>
                    <strong>Important Notes:</strong>
                </p>
                <ul class="list-disc list-inside  indent-4 my-3">
                    <li>
                        Payments are calculated based on the delivered orders and are
                        processed in accordance with our payment policy.
                    </li>
                    <li>
                        Ensure that all orders are correctly processed and delivered to be
                        eligible for payments.
                    </li>
                </ul>
                <p>
                    If you have any questions regarding the payment schedule, please feel free
                    to contact us at <strong>0315-9999547</strong>.
                </p>
            </ol>
        </x-web-content-section>
        <div class="my-2">
            <hr size="2" width="100%" />
        </div>
        <x-web-content-section title="Refund/Complaint Handling Policy">
            <p class="text-sm py-4">
                At Zee Dropshipping, we strive to ensure customer satisfaction. If a
                customer receives an incorrect, broken, or damaged item, we will arrange
                for an exchange delivery. Please follow the steps below to file a
                complaint:
            </p>
            <p class="text-lg my-1 text-primary-500">
                <strong>How to File a Complaint:</strong>
            </p>
            <ol class="text-sm">
                <li>
                    <div class="py-1 text-sm">
                        <i class="font-bold text-primary-500">1. Claim Submission:</i>
                    </div>
                </li>
                <ul class="list-disc list-inside  indent-4 my-1">
                    <li>
                        Claims must be filed within 48 hours of delivery.
                    </li>
                    <li>
                        To submit a claim, please call our customer support directly at
                        <strong>0315-9999547</strong>.
                    </li>
                    <li>
                        Ensure you have video proof demonstrating the issue with the item,
                        as verbal claims alone will not be accepted.
                    </li>
                </ul>
                <li>
                    <div class="py-1 text-sm">
                        <i class="font-bold text-primary-500">2. Process:</i>
                    </div>
                </li>
                <ul class="list-disc list-inside  indent-4 my-1">
                    <li>
                        Call our support team at <strong>0315-9999547</strong>.
                    </li>
                    <li>
                        Provide detailed information about the issue and share the video
                        proof.
                    </li>
                    <li>
                        Our support team will guide you through the process and arrange
                        for an exchange delivery if necessary.
                    </li>
                </ul>
                <p>
                <div class="py-1 text-sm">
                    <i class="font-bold text-primary-500">Proof and Timeline:</i>
                </div>
                </p>
                <ul class="list-disc list-inside  indent-4 my-3">
                    <li>
                        <strong>Video Proof:</strong> Video evidence showing the fault
                        with the item is mandatory. Verbal complaints or text descriptions
                        alone will not be sufficient.
                    </li>
                    <li>
                        <strong>Timely Claims:</strong> Claims must be made within 48
                        hours of receiving the parcel. Claims made outside this timeframe
                        will not be accepted.
                    </li>
                </ul>
            </ol>
        </x-web-content-section>
    </div>
@endsection
