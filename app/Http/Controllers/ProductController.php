<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $sizes = Size::all();
        return view('products.index', compact('products', 'sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
            'stock' => 'required|integer|min:0',
            'image-1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image-2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image-3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image-4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image-5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sizes' => 'array',
        ]);

        $product = new Product($validatedData);

        // حفظ الصور
        for ($i = 1; $i <= 5; $i++) {
            $imageField = "image-$i";
            if ($request->hasFile($imageField)) {
                $imagePath = $request->file($imageField)->store('products', 'public');
                $product->{$imageField} = $imagePath;
            }
        }

        $product->save();

        // حفظ المقاسات
        if ($request->has('sizes')) {
            foreach ($request->sizes as $size) {
                $product->sizes()->create(['size' => $size]);
            }
        }

        return redirect()->route('products.index')->with('success', 'تم إنشاء المنتج بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        $sizes = size::where('product_id', $id)->get();
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $sizes = size::where('product_id', $id)->get();
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
            'stock' => 'required|integer|min:0',
            'image-1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image-2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image-3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image-4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image-5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sizes' => 'array',
        ]);

        $product = Product::findOrFail($id);
        $product->fill($validatedData);

        // تحديث الصور
        for ($i = 1; $i <= 5; $i++) {
            $imageField = "image-$i";
            if ($request->hasFile($imageField)) {
                // حذف الصورة القديمة إذا وجدت
                if ($product->{$imageField}) {
                    \Storage::disk('public')->delete($product->{$imageField});
                }
                $imagePath = $request->file($imageField)->store('products', 'public');
                $product->{$imageField} = $imagePath;
            }
        }

        $product->save();

        // تحديث المقاسات
        $product->sizes()->delete(); // حذف المقاسات القديمة
        if ($request->has('sizes')) {
            foreach ($request->sizes as $size) {
                $product->sizes()->create(['size' => $size]);
            }
        }

        return redirect()->route('products.index')->with('success', 'تم تحديث المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        size::where('product_id', $id)->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
