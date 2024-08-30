<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $dropshippersSays = [
            ['image' => 'images/1.jpg', 'name' => 'Ali Raza - Lahore', 'comment' => 'Zee Dropshipping has transformed my business. The same-day dispatch and reliable logistics have helped me increase customer satisfaction and boost sales. The support team is always available, making the whole process smooth and stress-free.'],
            ['image' => 'images/2.jpg', 'name' => 'Sara Khan - Karachi', 'comment' => 'I’ve tried other platforms, but Zee Dropshipping stands out with its quality assurance and twice-a-week payments. It’s given me the confidence to scale my business, and I couldn’t be happier with the results!'],
            ['image' => 'images/3.jpg', 'name' => 'Bilal Ahmed - Sahiwal', 'comment' => 'The exclusive product requests and automated order processing have been game-changers for me. Zee Dropshipping’s system is efficient and user-friendly, which has significantly improved my business operations.'],
            ['image' => 'images/4.jpg', 'name' => 'Fatima Malik - Bahawalpur', 'comment' => 'Nationwide delivery through multiple logistic partners has been a huge advantage for my business. Zee Dropshipping has made it easy to reach customers all over Pakistan with fast and reliable service.'],
            ['image' => 'images/4.jpg', 'name' => 'Fareeha Jabeen - Rawalpindi', 'comment' => 'Zee Dropshipping has been instrumental in scaling my business. Their commitment to quality and timely deliveries is unmatched. The support team is always ready to assist, making the entire process smooth and efficient. Definitely a top choice for dropshipping!'],
            ['image' => 'images/4.jpg', 'name' => 'Omar Khan - Peshawar', 'comment' => 'Working with Zee Dropshipping has been a great experience. Their attention to detail and fast order fulfillment have exceeded my expectations. The ease of integration with Shopify and their reliable service make them a standout partner in the dropshipping world.'],
        ];

        $whyChoozeZee = [
            ['icon' => 'fa-solid fa-currency', 'text' => 'Twice-a-Week Payments'],
            ['icon' => 'fa-solid fa-currency', 'text' => 'Same-Day Dispatch Nationwide'],
            ['icon' => 'fa-solid fa-currency', 'text' => 'Dedicated Dropshipper Support'],
            ['icon' => 'fa-solid fa-currency', 'text' => 'Seamless Shopify Integration'],
            ['icon' => 'fa-solid fa-currency', 'text' => 'Exclusive Product Requests'],
            ['icon' => 'fa-solid fa-currency', 'text' => 'Lowest Product Prices'],
            ['icon' => 'fa-solid fa-currency', 'text' => 'Multiple Logistic Partners'],
            ['icon' => 'fa-solid fa-currency', 'text' => 'Automated Order Processing'],
            ['icon' => 'fa-solid fa-currency', 'text' => 'Optional Order Confirmation Facility'],
            ['icon' => 'fa-solid fa-currency', 'text' => 'Wide Range of Tested Products'],
            ['icon' => 'fa-solid fa-currency', 'text' => 'Real-Time Inventory Management'],
            ['icon' => 'fa-solid fa-currency', 'text' => 'Fast & Secure Payment Processing'],
            
        ];
        return view('guest.index', compact('dropshippersSays', 'whyChoozeZee'));
    }

    public function termsAndConditions()
    {
        return view('guest.terms-and-conditions');
    }

    public function policies()
    {
        return view('guest.policies');
    }

    public function contact()
    {
        return view('guest.contact');
    }
}
