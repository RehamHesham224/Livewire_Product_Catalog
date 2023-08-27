<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetails extends Component
{
    protected $listeners=['reviewAdded'=>'reviewUpdated'];
    public $product;
    public $cartCount;
    public $reviewText;
    public $rating;
    public $productId;
    public function mount($product){
        $this->productId=$product;
        $this->product=Product::findOrFail($product)->with('reviews')->first();
        $this->cartCount=\Cart::session(Auth::id())->getContent()->where('id',$this->product->id)->count();
    }
    public function render()
    {
        return view('livewire.product.product-details');
    }


    public function submitReview()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Create a new review instance
        $review = new Review([
            'text' => $this->reviewText,
            'rating' => $this->rating,
        ]);

        // Associate the review with the product and user
        $this->product->reviews()->save($review);
        $user->reviews()->save($review);

        // Clear the input fields after submission
        $this->reviewText = '';
        $this->rating = null;

        // Optionally, emit an event for UI updates
        $this->emit('reviewAdded');
    }
    public function reviewUpdated(){
        $this->product=Product::findOrFail($this->productId)->with('reviews')->first();
    }
}
