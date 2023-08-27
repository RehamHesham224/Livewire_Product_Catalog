<x-app-layout>

    <div class="container">
        @if(session('message'))
         <div>{{session('message')}}</div>
        @endif
       @livewire('products')

    </div>


</x-app-layout>
