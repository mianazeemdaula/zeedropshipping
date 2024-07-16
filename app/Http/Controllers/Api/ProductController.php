<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    public function featured()
    {
        $products = Product::where('featured', true)->get();
        return response()->json($products, 200);
    }
}
