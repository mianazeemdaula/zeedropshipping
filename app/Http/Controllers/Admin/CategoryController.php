<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Helper\MediaHelper;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();
        if($request->hasFile('image')){
            $media = MediaHelper::store($request->file('image'), $category->id, Category::class);
            $category->image = $media->file_path;
            $category->save();
        }
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        if($request->hasFile('image')){
            $media = $category->media;
            if($media){
                File::delete(public_path("media/".$media->file_path));
                File::delete(public_path("media/".$media->file_thumbnail));
            }
            $media = MediaHelper::store($request->file('image'), $category->id, Category::class);
            $category->image = $media->file_path;
            $category->save();
        }
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
