<div>
    <div class="my-3">
        @if($cartCount > 0)
            <span class="font-bold bg-gray-500 text-white p-2 rounded-md"> In Cart</span>
        @else
            <div>
                <button
                    class="inline-flex my-4 py-2 px-4 bg-blue-500 text-white font-semibold rounded-sm focus:outline-none focus-visible:ring"
                    wire:click="addToCart({{$productId}})">
                    Add To Cart
                </button>
            </div>
        @endif
    </div>

    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
