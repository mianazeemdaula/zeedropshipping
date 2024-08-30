@extends('layouts.web')
@section('content')
    <div class="p-8 my-4 md:p-4 lg:p-4">
        <p class="text-2xl"><strong>Courier Charges Policy</strong></p>
        <ul class="list-decimal">
            <li>
                <p><strong>Delivery charges</strong> are calculated based on the wholesale price of the order and packing
                    costs. Below is the breakdown of how charges are determined:</p>
            </li>
            <br />
            <ol class="list-decimal list-inside">
                <li><strong>For Orders Up to Rs.1800/-:</strong></li>
                <ul class="list-disc list-inside">
                    <li>Delivery Charges: Rs.180/-</li>
                    <li>Packing Charges: Rs.30/-</li>
                    <li><strong>Total Charges:</strong> Rs.210/-</li>
                </ul>
                <li><strong>For Orders Exceeding Rs.1800/- and Up to Rs.5000/-:</strong></li>
                <ul class="list-disc list-inside">
                    <li>Delivery Charges: 10% of the total wholesale amount</li>
                    <li>Packing Charges: Rs.30/-</li>
                    <li><strong>Example:</strong> For an order of Rs.2000/-, delivery charges will be Rs.200/-, plus packing
                        charges of Rs.30/-, totaling Rs.230/-</li>
                </ul>
                <li><strong>For Orders Over Rs.5000/-:</strong></li>
                <ul class="list-disc list-inside">
                    <li>Delivery Charges: 5% of the total wholesale amount</li>
                    <li>Packing Charges: Rs.30/-</li>
                    <li><strong>Example:</strong> For an order of Rs.7000/-, delivery charges will be Rs.350/-, plus packing
                        charges of Rs.30/-, totaling Rs.380/-</li>
                </ul>
            </ol>
            <p><strong>Additional Information:</strong></p>
            <ul class="list-disc list-inside">
                <li>These delivery charges are separate from your selling price or COD price.</li>
                <li>In case of failed or returned deliveries, a fee of Rs.250/- will be deducted from your profit. This
                    deduction will be made during your profit payment process.</li>
            </ul>
            <li>
                <p><strong>Profit Payment Policy</strong></p>
                <p>At Zee Dropshipping, we are committed to providing timely payments to our dropshippers. Here&rsquo;s how
                    our
                    payment system works:</p>
                <ol class="list-disc">
                    <li><strong>Standard Payment Schedule:</strong></li>
                    <ul class="list-disc list-inside">
                        <li>Payments are made twice a week.</li>
                        <li>Standard payment is processed every Friday.</li>
                    </ul>
                    <li><strong>Enhanced Payment Schedule:</strong></li>
                    <ul class="list-disc list-inside">
                        <li>Dropshippers with more than 30 orders delivered daily will receive an additional payment on
                            Wednesdays.</li>
                    </ul>
                </ol>
                <p><strong>Important Notes:</strong></p>
                <ul class="list-disc list-inside">
                    <li>Payments are calculated based on the delivered orders and are processed in accordance with our
                        payment
                        policy.</li>
                    <li>Ensure that all orders are correctly processed and delivered to be eligible for payments.</li>
                </ul>
                <p>If you have any questions regarding the payment schedule, please feel free to contact us.</p>
                <p>0315-9999547</p>
            </li>
            <li>
                <strong>Refund/Complaint Handling Policy</strong>
                <p>At Zee Dropshipping, we strive to ensure customer satisfaction. If a customer receives an incorrect,
                    broken,
                    or damaged item, we will arrange for an exchange delivery. Please follow the steps below to file a
                    complaint:</p>
                <h3>How to File a Complaint:</h3>
                <ol class="list-disc list-inside">
                    <li><strong>Claim Submission:</strong></li>
                    <ul class="list-disc list-inside">
                        <li>Claims must be filed within 48 hours of delivery.</li>
                        <li>To submit a claim, please call our customer support directly at 0315-999547</li>
                        <li>Ensure you have video proof demonstrating the issue with the item, as verbal claims alone
                            will
                            not
                            be accepted.</li>
                    </ul>
                    <li><strong>Process:</strong></li>
                    <ul class="list-disc list-inside">
                        <li>Call our support team at 0315-9999547.</li>
                        <li>Provide detailed information about the issue and share the video proof.</li>
                        <li>Our support team will guide you through the process and arrange for an exchange delivery if
                            necessary.</li>
                    </ul>
                    <li class="text-xl">Proof and Timeline:</li>
                    <ul class="list-disc list-inside">
                        <li><strong>Video Proof:</strong> Video evidence showing the fault with the item is mandatory.
                            Verbal
                            complaints or text descriptions alone will not be sufficient.</li>
                        <li><strong>Timely Claims:</strong> Claims must be made within 48 hours of receiving the parcel.
                            Claims
                            made
                            outside this timeframe will not be accepted.</li>
                    </ul>
            </li>

        </ul>
    </div>
@endsection
