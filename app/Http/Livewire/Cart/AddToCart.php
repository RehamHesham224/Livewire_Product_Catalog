<?php

namespace App\Http\Livewire\Cart;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCart extends Component
{
    public $productId;
    public $cartCount;
    public function mount($productId,$cartCount){
        $this->productId = $productId;
        $this->cartCount = $cartCount;
    }
    public function render()
    {
        return view('livewire.cart.add-to-cart');
    }
    public function addToCart($id){
        $product=Product::findOrFail($id);
        \Cart::session(Auth::id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));
        $this->emit('productAdded');
    }
}
