@extends('layouts.web')
@section('title', 'About | Zeedropshipping')
@section('content')
    <div class="px-8 py-4">
        <h1 class="text-2xl text-primary-500 font-bold delay-[300ms] duration-[600ms] taos:scale-[0.6] taos:opacity-0"
            data-taos-offset="50">About</h1>
        <p class="text-sm delay-[300ms] duration-[1000ms] taos:[transform:translate3d(0,200px,0)_scale(0.6)] taos:opacity-0"
            data-taos-offset="50">Welcome to Zee Dropshipping, your trusted partner in the world of e-commerce! At Zee
            Dropshipping,
            we are
            committed to empowering dropshippers with a seamless and efficient platform designed to elevate their business
            to new heights. Our mission is to provide a hassle-free dropshipping experience, ensuring that you can focus on
            what you do best—selling great products and growing your business.</p>
    </div>
    <x-web-content-section title="Why Choose Zee Dropshipping?" image="{{ asset('assets/images/about.jpg') }}"
        height="h-[580px]">
        <div class="pt-1 text-sm">
            <div class="font-bold text-primary-500">1. Wide Range of Quality Products:</div> Explore a diverse selection of
            tested
            products, with frequent updates to keep your inventory fresh and appealing, helping you attract more customers.
        </div>
        <div class="pt-1 text-sm">
            <div class="font-bold text-primary-500">2. Shopify Integration:</div> Manage your store effortlessly with
            seamless
            Shopify integration that automates key processes, allowing you to focus on scaling your business without the
            hassle.
        </div>
        <div class="py-1 text-sm">
            <div class="font-bold text-primary-500">3. Same-Day Dispatch:</div>
            Enjoy fast order processing and same-day dispatch, ensuring that your customers receive their orders quickly,
            enhancing their shopping experience.
        </div>
        <div class="py-1 text-sm">
            <div class="font-bold text-primary-500">4. Twice-a-Week Payments:</div>
            Receive payments twice a week for dropshippers with 100+ delivered orders, ensuring steady cash flow and
            allowing you to reinvest in your business.
        </div>
        <div class="py-1 text-sm">
            <div class="font-bold text-primary-500">5. Product Quality Assurance:</div>
            We collaborate with trusted suppliers to guarantee high-quality standards for every product, ensuring customer
            satisfaction and minimizing returns.
        </div>
        <div class="py-1 text-sm">
            <div class="font-bold text-primary-500">6. Dedicated Support Team:</div>
            Our support team is available to assist you with any dropshipping inquiries, providing timely help to keep your
            business running smoothly.
        </div>
        <div class="py-1 text-sm">
            <div class="font-bold text-primary-500">7. Automated Order Processing:</div>
            Simplify your operations with our automated order processing system, reducing manual tasks and allowing you to
            manage your store efficiently.
        </div>
        <div class="py-1 text-sm">
            <div class="font-bold text-primary-500">8. Exclusive Product Requests:</div>
            Access unique products that only you can sell, providing a competitive advantage and helping you differentiate
            your store from others.
        </div>
        <div class="py-1 text-sm">
            <div class="font-bold text-primary-500">9. Optional Order Confirmation:</div>
            Use our optional order confirmation service to ensure customer readiness, which can significantly reduce return
            rates and increase customer satisfaction.
        </div>
        <div class="py-1 text-sm">
            <div class="font-bold text-primary-500">10. Multiple Logistic Partners:</div>
            Benefit from reliable nationwide delivery and competitive rates through our logistics network, ensuring that
            your customers receive their orders on time.
        </div>

    </x-web-content-section>
@endsection
