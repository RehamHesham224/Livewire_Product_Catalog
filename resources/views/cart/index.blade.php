<x-app-layout>
    <table >
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartItems as $item)
            <tr>
                <td scope="row">{{$item['name']}}</td>
                <td>
                    {{Cart::session(auth()->id())->get($item['id'])->getPriceSum()}}
                </td>
                <td>
                    {{$item['quantity']}}
                </td>
                <td>
                    <div>
                        Edit
{{--                        <livewire:cart-update :item="$item" :key="$item['id']"/>--}}
                    </div>
                </td>
                <td>
                    <div>
                        {{--                                   <livewire:cart-delete :item="$item" :key="$item['id']"/>--}}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-5 ml-auto">
            <div class="cart-page-total">
                <h2>Cart totals</h2>
                <ul>
                    <li> Total Price : ${{Cart::session(auth()->id())->getTotal()}}</li>
                    <li>Total<span>{{\Cart::session(auth()->id())->getTotal()}}</span></li>
                </ul>
                <a href="{{route('cart.checkout')}}">Proceed to checkout</a>
            </div>
        </div>
    </div>
</x-app-layout>
