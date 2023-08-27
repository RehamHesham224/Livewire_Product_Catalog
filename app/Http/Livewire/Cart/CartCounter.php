<?php

namespace App\Http\Livewire\Cart;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCounter extends Component
{
    public $cart_count = 0;

    protected $listeners = [
        'productAdded' => 'updateCartTotal',
        'productRemoved' => 'updateCartTotal',
        'clearCart' => 'updateCartTotal'
    ];

    public function mount(){
        $this->cart_count=\Cart::session(Auth::id())->getContent()->count();
    }
    public function render()
    {
        return view('livewire.cart.cart-counter');
    }
    public function updateCartTotal(){
        $this->cart_count=\Cart::session(Auth::id())->getContent()->count();
    }
}
