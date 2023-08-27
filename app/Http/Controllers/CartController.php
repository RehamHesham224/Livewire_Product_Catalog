<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
//    public function add(Product $product){
//        \Cart::session(Auth::id())->add(array(
//            'id' => $product->id,
//            'name' => $product->name,
//            'price' => $product->price,
//            'quantity' => 1,
//            'attributes' => array(),
//            'associatedModel' => $product
//        ));
//        return redirect()->back()->with('message', 'Added to cart');
//    }
//    public function index(){
//        //cartItems
//        $cartItems=\Cart::session(Auth::id())->getContent();
//        return view('cart.index',compact('cartItems'));
//    }
    public function destroy($itemId){
        //cartItem
        \Cart::session(Auth::id())->remove($itemId);
        return redirect()->back()->with('message', 'Deleted Successfully');
    }
    public function update($itemId){
        //cartItem
        \Cart::session(Auth::id())->update($itemId,[
            'quantity'=>array(
                'relative'=>false,
                'value' => request('quantity'),
            )
        ]);
        return redirect()->back()->with('message', 'Updated Successfully');
    }

    public function checkout(){
        return view('cart.checkout');
    }
}
