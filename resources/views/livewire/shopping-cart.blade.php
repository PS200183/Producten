

<div class="bg-gray-100 h-screen py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="md:w-3/4">
                <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold">Product</th>
                                <th class="text-left font-semibold">Price</th>
                                <th class="text-left font-semibold">Quantity</th>
                                <th class="text-left font-semibold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($cartitems as $item) 
                            <tr wire:key='{{ $item->id}}'>
                               
                                    
                                <td class="py-4">
                                    
                                    <div class="flex items-center">
                                        
                                        <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-12 h-12 object-cover rounded-full mr-4">
                                        <span class="font-semibold" >{{ $item->product->naam }}</span>
                                        <button class="  text-red-500" wire:click="removeFromCart({{ $item->id }})">
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        </button>
                                    </div>
                                </td>
                                <td class="py-4">&euro;{{ $item->product->prijs }}</td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                       <button class="border rounded-md py-2 px-4 mr-2"
                                                    wire:click="minusQuantity({{ $item->id }})">
                                                    -
                                                </button>
                                        <span class="text-center w-8">{{ $item->quantity }}</span>
                                       <button class="border rounded-md py-2 px-4 mr-2"
                                                    wire:click="updateQuantity({{ $item->id }})" >
                                                    +
                                                </button>

                                    </div>
                                </td>
                                <td class="py-4"> &euro;{{ $item->total }}</td>
                                
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="md:w-1/4">
                
                   
                    <hr class="my-2">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">Total:</span>
                        <span class="font-semibold">&euro;{{ $total }}</span>
                    </div>
                    <button class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>