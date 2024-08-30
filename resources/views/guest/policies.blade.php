@extends('layouts.web')
@section('content')
    <div class="p-8 my-4 md:p-4 lg:p-4">
        <p class="text-2xl my-2">
            <strong>Courier Charges Policy</strong>
        </p>
        <p class="text-lg my-2">
            <strong>Delivery Charges and Packing Costs</strong>
        </p>
        <p>
            Delivery charges are calculated based on the wholesale price of the order
            and packing costs. Below is the breakdown:
        </p>
        <ol class="list-decimal">
            <li>
                <strong>For Orders Up to Rs.1800/-</strong>
            </li>
            <ul class="list-disc list-inside indent-4 my-3">
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
                <strong>For Orders Exceeding Rs.1800/- and Up to Rs.5000/-</strong>
            </li>
            <ul class="list-disc list-inside  indent-4 my-3">
                <li>
                    <strong>Delivery Charges:</strong> 10% of the total wholesale
                    amount
                </li>
                <li>
                    <strong>Packing Charges:</strong> Rs.30/-
                </li>
                <li>
                    <strong>Example:</strong> For an order of Rs.2500/-, delivery
                    charges will be Rs.250/-, plus packing charges of Rs.30/-,
                    totaling Rs.280/-
                </li>
            </ul>
            <li>
                <strong>For Orders Over Rs.5000/-</strong>
            </li>
            <ul class="list-disc list-inside  indent-4 my-3">
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
        <p>
            <strong>Additional Information:</strong>
        </p>
        <ul class="list-disc list-inside  indent-4 my-3">
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

        <div class="my-2">
            <hr size="2" width="100%" />
        </div>
        <p class="text-lg my-2">
            <strong>Profit Payment Policy</strong>
        </p>
        <p>
            At Zee Dropshipping, we are committed to providing timely payments to our
            Dropshippers. Here’s how our payment system works:
        </p>
        <ol class="list-decimal">
            <li>
                <strong>Standard Payment Schedule:</strong>
            </li>
            <ul class="list-disc list-inside  indent-4 my-3">
                <li>
                    Payments are made twice a week.
                </li>
                <li>
                    <strong>Standard Payment:</strong> Processed every Friday.
                </li>
            </ul>
            <li>
                <strong>Enhanced Payment Schedule:</strong>
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
        <div class="my-2">
            <hr size="2" width="100%" />
        </div>
        <p class="text-lg my-2">
            <strong>Refund/Complaint Handling Policy</strong>
        </p>
        <p>
            At Zee Dropshipping, we strive to ensure customer satisfaction. If a
            customer receives an incorrect, broken, or damaged item, we will arrange
            for an exchange delivery. Please follow the steps below to file a
            complaint:
        </p>
        <p class="text-lg my-2">
            <strong>How to File a Complaint:</strong>
        </p>
        <ol class="list-decimal">
            <li>
                <strong>Claim Submission:</strong>
            </li>
            <ul class="list-disc list-inside  indent-4 my-3">
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
                <strong>Process:</strong>
            </li>
            <ul class="list-disc list-inside  indent-4 my-3">
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
                <strong>Proof and Timeline:</strong>
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
    </div>
@endsection
