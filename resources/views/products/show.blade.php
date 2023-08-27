<x-app-layout>
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
                <div class="pt-2">
                    <i class="far fa-heart cursor-pointer"></i>
                    <span class="text-sm text-gray-400 font-medium">12 likes</span>
                </div>
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
                <div class="mb-2">
                    <div class="mb-2 text-sm">
                        @if($cartCount < 0)
                            In Cart
                        @else
                            <div>
                               @livewire('add-to-cart',['productId' => $product->id])
                            </div>
                        @endif
                    </div>
                </div>
                <div class="text-sm mb-2 text-gray-400 cursor-pointer font-medium">View all 14 comments</div>

            </div>
        </div>
    </div>
</x-app-layout>
