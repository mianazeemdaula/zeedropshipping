<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
        $products = \App\Models\Product::orderBy('id','desc')->take(20)->get();
        $productsCount = \App\Models\Product::count();
        $userCount = \App\Models\User::count();
        $ordersCount = \App\Models\Order::count();
        return view('web.index', compact('dropshippersSays', 'whyChoozeZee','products','productsCount','userCount','ordersCount'));
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

    public function products(Request $request)  {
        $method = $request->method();
        $categoreis = \App\Models\Category::whereHas('products')->get();
        if($method == 'POST') {
            $cats = $request->cats;
            $sort = $request->sort;
            $minPrice = $request->from_price;
            $maxPrice = $request->to_price;
            $sortColumn = 'id';
            $search = $request->search;
            if($sort){
                if($sort == 'price_low_to_high'){
                    $sortColumn = 'sale_price';
                    $sort = 'asc';
                } else if($sort == 'price_high_to_low') {
                    $sortColumn = 'sale_price';
                    $sort = 'desc';
                }else if($sort == 'newest') {
                    $sortColumn = 'id';
                    $sort = 'desc';
                }else if($sort == 'oldest') {
                    $sortColumn = 'id';
                    $sort = 'asc';
                }else if($sort == 'best_selling') {
                    $sortColumn = 'sales_count';
                    $sort = 'desc';
                }
            }
            $products = \App\Models\Product::when($cats, function($query, $cats) {
                return $query->whereHas('categories', function($q) use ($cats) {
                    $q->whereIn('id', array_keys($cats));
                });
            })->when($sort, function($query, $sort) use ($sortColumn) {
                return $query->orderBy($sortColumn, $sort);
            })->when($minPrice, function($query, $minPrice) {
                return $query->where('sale_price','>=',$minPrice);
            })->when($maxPrice, function($query, $maxPrice) {
                return $query->where('sale_price','<=',$maxPrice);
            })->when($search, function($query, $search) {
                return $query->where('name','like','%'.$search.'%');
            })->paginate(52);
            $filters = $request->all();
            return view('guest.products', compact('products','categoreis','filters'));
        }
        $products = \App\Models\Product::orderBy('id','desc')->paginate(52);
        return view('guest.products', compact('categoreis','products'));
    }

    public function productDetails($id) {
        $product = \App\Models\Product::findOrFail($id);
        return view('guest.product_details',compact('product'));
    }

    public function downloadProductImages($id){
        $product = \App\Models\Product::find($id);
        $zip = new \ZipArchive();
        $zipFileName = strtolower(str_replace("-","_",$product->sku)).'_images.zip';
        if($zip->open(public_path($zipFileName), \ZipArchive::CREATE) === TRUE){
            
            foreach($product->media as $media){
                $fileName = $media->id.'.'.$media->file_ext;
                if(str_starts_with($media->file_path,"http")){
                    // download image from url and save to public path
                    $fileName = time() . '_'.$media->mediable_id .".". $media->file_ext;
                    $client = new Client();
                    $response = $client->request('GET', $media->file_path);
                    $ext = explode('.', $media->file_path);
                    $client->get($media->file_path, ['sink' => public_path('assets/products/'.$fileName)]);
                    $zip->addFile(public_path('assets/products/'.$fileName), $fileName);
                    $media->file_path = 'assets/products/'.$fileName;
                    $media->save();
                }else{
                    $zip->addFile(public_path($media->file_path), $fileName);
                }
            }
            $zip->close();
        }
        return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
    }

    public function postContact(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $data = $request->all();
        \Mail::to('support@zeedropshipping.com')->send(new \App\Mail\ContactMail($data));
        return back()->with('success','Your message has been sent successfully.');
    }
}
