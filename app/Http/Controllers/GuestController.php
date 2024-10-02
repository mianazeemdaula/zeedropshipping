<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $dropshippersSays = [
            ['image' => 'assets/images/female-avatar.png', 'name' => 'Aisha Khan - Lahore', 'comment' => "Joining Zee Dropshipping has transformed my business. The exclusive products and twice-a-week payments have been game-changers. It's the best decision I've made for scaling my dropshipping!"],
            ['image' => 'assets/images/male-avatar.png', 'name' => 'Ahmed Shahid - Karachi', 'comment' => "The level of support and quality assurance at Zee Dropshipping is unmatched. The streamlined order process and same-day dispatch have taken my sales to new heights. Highly recommend as dropshipping!"],
            ['image' => 'assets/images/female-avatar.png', 'name' => 'Fatima Ali - Bahawalpur', 'comment' => "Zee Dropshipping's unique benefits, like the luxury Dubai tour incentive, and their exceptional service have made them my go-to partner. It's been an incredible experience with unmatched growth."],
            ['image' => 'assets/images/male-avatar.png', 'name' => 'Bilal Rizvi - Peshawar', 'comment' => "The integration with Shopify and the wide range of tested products offered by Zee Dropshipping have made managing my store easier than ever. Their commitment to dropshipper success is evident in everything they do."],
        ];

        $whyChoozeZee = [
            ['icon' => 'fa-solid fa-dollar', 'text' => 'Twice-a-Week Payments'],
            ['icon' => 'fa-solid fa-truck', 'text' => 'Same-Day Dispatch Nationwide'],
            ['icon' => 'fa-solid fa-question', 'text' => 'Dedicated Dropshipper Support'],
            ['icon' => 'fa-brands fa-shopify', 'text' => 'Seamless Shopify Integration'],
            ['icon' => 'fa-solid fa-tags', 'text' => 'Exclusive Product Requests'],
            ['icon' => 'fa-solid fa-money-bill', 'text' => 'Lowest Product Prices'],
            ['icon' => 'fa-solid fa-truck-fast', 'text' => 'Multiple Logistic Partners'],
            ['icon' => 'fa-solid fa-robot', 'text' => 'Automated Order Processing'],
            ['icon' => 'fa-solid fa-circle-check', 'text' => 'Optional Order Confirmation Facility'],
            ['icon' => 'fa-solid fa-arrow-up-wide-short', 'text' => 'Wide Range of Tested Products'],
            ['icon' => 'fa-solid fa-rotate', 'text' => 'Real-Time Inventory Management'],
            ['icon' => 'fa-solid fa-money-check', 'text' => 'Fast & Secure Payment Processing'],
            
        ];
        $products = \App\Models\Product::orderBy('id','desc')->take(10)->get();
        return view('web.index', compact('dropshippersSays', 'whyChoozeZee','products'));
    }

    public function termsAndConditions()
    {
        return view('web.terms');
    }

    public function policies()
    {
        return view('guest.policies');
    }

    public function contact()
    {
        return view('guest.contact');
    }

    public function about()
    {
        return view('web.about');
    }

    public function productDetails($id) {
        $product = \App\Models\Product::findOrFail($id);
        return view('guest.product_details',compact('product'));
    }
}
