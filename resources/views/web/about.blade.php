@extends('layouts.web')

@section('content')
    <div class="px-8 py-4">
        <h1 class="font-Caveat text-4xl text-primary-500 font-bold delay-[300ms] duration-[600ms] taos:scale-[0.6] taos:opacity-0"
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
            <i class="font-bold text-primary-500">Wide Range of Quality Products:</i> We offer an extensive selection of
            over
            200 carefully
            tested and curated
            products
            to help you find the best-performing items for your store. Our focus on quality ensures that you can confidently
            offer these products to your customers.
        </div>
        <div class="py-1 text-sm">
            <i class="font-bold text-primary-500"> Same-Day Dispatch:</i>
            We understand that speed is crucial in the e-commerce world. With our same-day dispatch
            service, your orders are processed and shipped quickly, ensuring faster delivery times and happier customers.
        </div>
        <div class="py-1 text-sm">
            <i class="font-bold text-primary-500"> Twice-a-Week Payment:</i>
            We value your hard work and understand the importance of cash flow in running a
            successful
            business. For dropshippers with a minimum of 100 delivered orders, we offer the convenience of twice-a-week
            payments
            on Tuesdays and Fridays.
        </div>
        <div class="py-1 text-sm">
            <i class="font-bold text-primary-500"> Product Quality Assurance:</i>
            Quality is at the core of everything we do. We work closely with our suppliers to
            ensure that every product meets our high standards, giving you and your customers peace of mind.
        </div>
        <div class="py-1 text-sm">
            <i class="font-bold text-primary-500"> Dedicated Support:</i>
            Our dedicated support team is here to assist you every step of the way. Whether you need
            help
            with order processing, product selection, or any other aspect of your dropshipping journey, we're just a call or
            message away.
        </div>
        <div class="py-1 text-sm">
            <i class="font-bold text-primary-500"> Automated Order Processing:</i>
            We believe in making your life easier. Our automated order processing system
            streamlines your workflow, reducing the time and effort required to manage your business.
        </div>
        <div class="py-1 text-sm">
            <i class="font-bold text-primary-500"> Exclusive Product Requests:</i>
            Want to stand out from the competition? We offer an exclusive product request
            feature,
            allowing you to lock in unique products that no other dropshipper can sell. This gives you a competitive edge
            and
            helps you build a loyal customer base.
        </div>
        <div class="py-1 text-sm">
            <i class="font-bold text-primary-500"> Optional Order Confirmation Facility:</i>
            We provide the option for order confirmation, adding an extra layer of
            assurance for you and your customers. This optional service ensures that your customers are ready to receive
            their
            orders, reducing the chances of returns.
        </div>
        <div class="py-1 text-sm">
            <i class="font-bold text-primary-500"> Multiple Logistic Partners:</i>
            We have partnered with multiple logistic companies to ensure nationwide delivery
            coverage. This allows us to offer you competitive courier rates and reliable shipping services.
        </div>
        <div class="py-1 text-sm">
            <i class="font-bold text-primary-500"> Shopify Integration:</i>
            To make your dropshipping experience even more seamless, we offer easy integration with
            Shopify. This allows you to manage your store efficiently and focus on scaling your business.
        </div>

    </x-web-content-section>
@endsection
