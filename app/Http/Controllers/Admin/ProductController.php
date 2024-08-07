<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Helper\MediaHelper;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'discount_price' => 'required',
            'vat' => 'required',
            'stock' => 'required',
            'low_stock_report' => 'required',
            'min_order_qty' => 'required',
            'max_order_qty' => 'required',
            'description' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->user_id = auth()->id();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->discount_price = $request->discount_price;
        $product->vat = $request->vat;
        $product->stock = $request->stock;
        $product->low_stock_report = $request->low_stock_report;
        $product->min_order_qty = $request->min_order_qty;
        $product->max_order_qty = $request->max_order_qty;
        $product->description = $request->description;
        $product->other_details = $request->other_details;
        $product->status = $request->status == 'on' ? 1 : 0;
        $product->save();

        // array of images
        if($request->hasFile('image')){
            $files = $request->file('image');
            foreach($files as $file){
                $media = MediaHelper::store($file, $product->id, Product::class);
                if($file == $files[0]){
                    $product->image = $media->file_path;
                    $product->save();
                }
            }
        }
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products,sku,'.$id,
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'discount_price' => 'required',
            'vat' => 'required',
            'stock' => 'required',
            'low_stock_report' => 'required',
            'min_order_qty' => 'required',
            'max_order_qty' => 'required',
            'description' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->discount_price = $request->discount_price;
        $product->vat = $request->vat;
        $product->stock = $request->stock;
        $product->low_stock_report = $request->low_stock_report;
        $product->min_order_qty = $request->min_order_qty;
        $product->max_order_qty = $request->max_order_qty;
        $product->description = $request->description;
        $product->other_details = $request->other_details;
        $product->status = $request->status == 'on' ? 1 : 0;
        $product->save();
        // array of images
        if($request->hasFile('image')){
            $files = $request->file('image');
            foreach($files as $file){
                $media = MediaHelper::store($file, $product->id, Product::class);
                if($file == $files[0]){
                    $product->image = $media->file_path;
                    $product->save();
                }
            }
        }
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
