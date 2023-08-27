
    <div class="flex justify-center">
        <div class="rounded overflow-hidden border w-full lg:w-6/12 md:w-6/12 bg-white mx-3 md:mx-0 lg:mx-0">
            <div class="w-full flex justify-between p-3">
                <div class="flex">
                    <h1 class="pt-1 ml-2 font-bold text-lg">{{$product->name}}</h1>
                </div>
                <span class="px-2 hover:bg-gray-300 cursor-pointer rounded"><i class="fas fa-ellipsis-h pt-2 text-lg"></i></span>
            </div>
            <div>
                @if ($product->image)
                    <img class="w-full bg-cover" src="{{$product->image}}">
                @else
                    <img class="w-full bg-cover " src="https://3.bp.blogspot.com/-Chu20FDi9Ek/WoOD-ehQ29I/AAAAAAAAK7U/mc4CAiTYOY8VzOFzBKdR52aLRiyjqu0MwCLcBGAs/s1600/DSC04596%2B%25282%2529.JPG">
                @endif
            </div>
            <div class="px-3 pb-2">
{{--                <div class="pt-2">--}}
{{--                    <i class="far fa-heart cursor-pointer"></i>--}}
{{--                    <span class="text-sm text-gray-400 font-medium">12 likes</span>--}}
{{--                </div>--}}
                <div class="flex justify-between">
                    <div class="pt-1">
                        <div class="mb-2 text-sm">
                            {{$product->description}}
                        </div>
                    </div>
                    <div class="pt-1">
                        <div class="mb-2 text-sm">
                            ${{$product->price}}
                        </div>
                    </div>
                </div>
                @livewire('cart.add-to-cart',['productId' => $product->id, 'cartCount' => $cartCount])

{{--                <div class="text-sm mb-2 text-gray-400 cursor-pointer font-medium">View all 14 comments</div>--}}
                <form wire:submit.prevent="submitReview" class="mt-8">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Write your review:</label>
                        <textarea wire:model="reviewText" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" rows="4" placeholder="Write your review"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Rating (1-5):</label>
                        <input type="number" wire:model="rating" min="1" max="5" class="w-16 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg focus:outline-none focus:ring hover:bg-blue-600">Submit Review</button>
                </form>
                <div>
                    <!-- ... Product Reviews ... -->
                    @if($product->reviews != null && $product->reviews->count() > 0)
                        <h3 class="text-xl font-semibold mb-4">Reviews</h3>
                        @foreach ($product->reviews as $review)
                            <div class="bg-white rounded-lg p-4 shadow mb-4">
                                <p class="text-lg font-semibold mb-2">Rating: {{ $review->rating }}</p>
                                <p class="text-gray-600">{{ $review->text }}</p>
                                <p class="text-gray-500 mt-2">By: {{ $review->user->name }}</p>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
