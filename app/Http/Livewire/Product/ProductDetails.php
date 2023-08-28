<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetails extends Component
{
    protected $listeners=[
        'reviewAdded'=>'reviewUpdated',
        'productAdded'=>'$refresh'
    ];
    public $product;
    public $cartCount;
    public $reviewText;
    public $rating;
    public $productId;
    public function mount($productId)
    {
        $this->productId = $productId;
        $this->product = Product::find($this->productId);
    }
    public function render()
    {
        $this->cartCount = \Cart::session(Auth::id())->getContent()->where('id', $this->product->id)->sum('quantity');
        return view('livewire.product.product-details');
    }

    public function addToCart(){
        $product=Product::findOrFail($this->productId);
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
        $this->product=Product::findOrFail($this->product->id);
    }

}
