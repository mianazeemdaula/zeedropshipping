<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Helper\MediaHelper;
use App\Helper\CSVHelper;
use App\Models\Media;
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
            'weight' => 'required',
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
        $product->weight = $request->weight;
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
            'weight' => 'required',
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
        $product->weight = $request->weight;
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
            $sortIndex = 1;
            foreach($files as $file){
                $media = MediaHelper::store($file, $product->id, Product::class);
                $media->sort = $sortIndex++;
                $media->save();
                if($file == $files[0]){
                    $product->image = $media->file_path;
                    $product->save();
                }
            }
        }
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    public function makeDefaultImage(Request $request){
        $product = Product::find($request->product_id);
        $product->image = $request->image;
        $product->save();
        return redirect()->back()->with('success', 'Default image set successfully');
    }

    public function sortmedia(Request $request){
        $productId = $request->productId;
        $mediaIds = $request->mediaIds;
        $pro = Product::find($productId);
        $sortNo = 1;
        foreach ($mediaIds as $media) {
            Media::find($media)->update(['sort' => $sortNo++]);
        }
        return response()->json($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$request->search.'%')
        ->orWhere('sku', 'like', '%'.$request->search.'%')
        ->orWhere('description', 'like', '%'.$request->search.'%')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function importProducts(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        $file = $request->file('file');

        $rows = CSVHelper::readCSV($file);
        $products =  CSVHelper::namedKeys($rows);
        foreach($products as $product){
            $p = Product::where('sku', $product['sku'])->first();
            if(!$p){
                $cat = Category::where('name', $product['category'])->first();
                $p = new Product();
                $p->category_id = $cat->id;
                $p->user_id = auth()->id();
                $p->name = $product['name'];
                $p->sku = $product['sku'];
                $p->purchase_price = $product['purchase_price'];
                $p->sale_price = $product['sale_price'];
                $p->discount_price = $product['discount_price'];
                $p->vat = $product['vat'];
                $p->stock = $product['stock'];
                $p->weight = $product['weight'];
                $p->low_stock_report = $product['low_qty_stock'];
                $p->min_order_qty = $product['min_order_qty'];
                $p->max_order_qty = $product['max_order_qty'];
                $p->description = $product['description'];
                $p->status = in_array(strtolower($product['active']), ['active', 'yes', 'on','1']);
                $p->image = $product['image_1'];
                $p->save();
                if($product['image_2'] && $product['image_2'] != ''){
                    $media = MediaHelper::url($product['image_2'], $p->id, Product::class);
                }
                if($product['image_3'] && $product['image_3'] != ''){
                    $media = MediaHelper::url($product['image_3'], $p->id, Product::class);
                }
                if($product['image_4'] && $product['image_4'] != ''){
                    $media = MediaHelper::url($product['image_4'], $p->id, Product::class);
                }
                if($product['image_5'] && $product['image_5'] != ''){
                    $media = MediaHelper::url($product['image_5'], $p->id, Product::class);
                }
            }
        }
        return redirect()->route('admin.products.index')->with('success', 'Products imported successfully');
    }

    public function export(){
        return (new \App\Exports\ProductExport)->download('products.xlsx');
    }
}
