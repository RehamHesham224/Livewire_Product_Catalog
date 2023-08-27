<div>

    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">All Products </h1>
            {{ $sql }}

            <div class="mb-4">
                <input wire:model="search" type="text" placeholder="Search products...">
                <select wire:model="category">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name}}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                @foreach ($products as $product)
                    <div class="lg:flex">
                        <a href="{{route('products.show', ['product'=>$product->id])}}">
                            @if(!empty($product->image))
                                <img src="{{asset('storage/'.$product->image)}}" alt="">
                            @else
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                            @endif
                            <div class="flex flex-col justify-between py-6 lg:mx-6">
                                <a href="{{route('products.show', $product->id)}}" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                    {{$product->name}}
                                </a>

                                <span class="text-sm text-gray-500 dark:text-gray-300">{{$product->created_at}}</span>
                                <h5>$ {{$product->price}}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
{{--                    <div class="w-full flex justify-center pb-6">--}}
{{--                        {{ $products->links('layouts.pagination') }}--}}
{{--            </div>--}}

                    @if ($products->hasMorePages())
                        <div wire:loading>
                            Loading more products...
                        </div>

                        <div wire:target="loadMore">
                            <button wire:click="loadMore" class="bg-blue-500 text-white px-4 py-2 mt-4">Load More</button>
                        </div>
                    @endif
            </div>
        </div>
    </section>
</div>
