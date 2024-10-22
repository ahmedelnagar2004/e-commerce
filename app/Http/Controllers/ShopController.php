<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   public function index()
   {
    $products = Product::all();
    return view('shop.index', compact('products'));
   }
   public function show($id)
   {
    $product = Product::findOrFail($id);
    return view('shop.show', compact('product'));
   }

   public function search(Request $request)
   {
    $query = $request->input('query');
    $products = Product::where('name', 'like', "%$query%")
                       ->orWhere('description', 'like', "%$query%")
                       ->paginate(12);
    
    return view('shop.index', compact('products', 'query'));
   }
}
