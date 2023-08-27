<div>
    <div class="flex flex-col items-center justify-center">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5 ">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                #
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Price
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Quantity
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{$item->id}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{$item->name}}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{Cart::session(auth()->id())->get($item['id'])->getPriceSum()}}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <livewire:cart.cart-update :item="$item" :key="$item['id']"/>
                                 </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <a class="inline-flex my-4 py-2 px-4 bg-red-500 text-white font-semibold rounded-sm focus:outline-none focus-visible:ring"
                                        wire:click="removeFromCart('{{ $item['id'] }}')">
                                    Remove
                                </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="p-2 flex bg-gray-200 w-full justify-between">
                       <div>
                           <h2 class="font-bold">Cart totals</h2>
                           <ul>
                               <li>
                                   <span class="font-bold text-gray-700">Total Price :</span>
                                   ${{$totalPrice}}
{{--                                   ${{\Cart::session(auth()->id())->getTotal()}}--}}
                               </li>
                           </ul>
                       </div>
                        <a class="inline-flex my-4 py-2 px-4 bg-blue-500 text-white font-semibold rounded-sm focus:outline-none focus-visible:ring"
{{--                           href="{{route('cart.checkout')}}"--}}
                           wire:click.prevent="checkout"
                        >Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5 ">
        </div>
    </div>
</div>
