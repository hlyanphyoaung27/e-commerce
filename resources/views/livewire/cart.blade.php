<div class="grid grid-cols-4 mt-12 gap-4">
    <div class=" bg-white rounded-lg shadow p-5 col-span-3">
        <table class="w-full">
            <thead>
                <tr class="pb-1.5">
                    <th class="text-left">Product</th>
                    <th class="text-left">Price</th>
                    <th class="text-left">Size</th>
                    <th class="text-left">Color</th>
                    <th class="text-left">Quantity</th>
                    <th class="text-left">Total</th>
                </tr>
            </thead>
            <tbody class="divide-y" >
                @foreach ($this->items as $item)
                    <tr >
                        <td class="py-3">
                            {{$item->product->name}}
                        </td>
                        <td class="py-3">
                            {{$item->product->price}}
                        </td>
                        <td class="py-3" >
                            {{$item->variant->size}} 
                        </td>
                        <td class="py-3" >
                            {{$item->variant->color}}
                        </td>
                        
                        <td class="flex py-3 item-center" > 
                           <button wire:click = "decrease({{$item->id}})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </button>
                           <div class="m-2">
                             {{$item->quantity}}
                           </div>
                           <button wire:click = "increase({{$item->id}})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </button>
                        </td>
                        <td>{{$item->subtotal}}</td>
                        <td class="py-3">
                            <button wire:click = "delete({{$item->id}})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                  </svg>
                                  
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right font-medium">Total</td>
                    <td class="font-medium">{{$this->cart->total}}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div>
        <div class="bg-white rounded-lg shadow p-5 col-span-1">
            @guest
                <p>Please <a class="underline" href="{{route('register')}}">register</a> or <a class="underline" href="{{route('login')}}">login</a> to continue!</p>
            @endguest
            @auth
                <x-button class="block w-full p-2" wire:click="checkout">
                    <span class="text-center">Checkout</span>
                </x-button>
            @endauth
        </div>
    </div>
</div>
