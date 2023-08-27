<?php

namespace App\Http\Livewire\Cart;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartPage extends Component
{
    protected $listeners = [
        'cartUpdated' => '$refresh',
        'productRemoved'=>'syncCart',
        'clearCart'=>'syncCart'
    ];

    public $cartItems = [];
    public $totalPrice = 0;

    public function render()
    {
        $this->cartItems = \Cart::session(Auth::id())->getContent();
        $this->totalPrice=\Cart::session(auth()->id())->getTotal();
        return view('livewire.cart.cart-page');
    }

    public function syncCart()
    {
        $this->cartItems = \Cart::session(Auth::id())->getContent();
        $this->totalPrice=\Cart::session(auth()->id())->getTotal();
    }


    public function removeFromCart($itemId)
    {
        \Cart::session(Auth::id())->remove($itemId);
        $this->emit('productRemoved');
    }

    public function checkout(): void
    {
        \Cart::session(Auth::id())->clear();
        $this->emit('clearCart');
    }
}
