<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
//    public function index()
//    {
//        $cart=\Cart::session(Auth::id())->getContent();
//        $products = Product::paginate(10); // Change pagination settings as needed
//        return view('products.index');
//    }
//
//    public function show(Product $product)
//    {
//        $cartCount=\Cart::session(Auth::id())->getContent()->where('id',$product->id)->count();
//        return view('products.show', compact('product','cartCount'));
//    }

    public function search(Request $request)
    {
        $query=$request['query'];
        $products=Product::where('name','LIKE',"%$query%")->paginate(10);
        return view('products.catalog',compact('products'));
    }
}
