<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Productsdetails extends Component
{
    public $quantity = 1;

    public $product;

    public function mount($product)
    {
        $this->product = Product::find($product);
    }

    public function addToCart()
    {
        if ($this->quantity <= 0) {
            $this->quantity = 1;
        }

        $cart = Cart::where('product_id', $this->product->id)->where('user_id', auth()->id())->first();
        if ($cart) {
            $cart->update(
                [
                    'quantity' => $cart->quantity + $this->quantity,
                    'total' => $cart->quantity * $this->product->prijs,
                ]
            );

            session()->flash('message', 'Product added to cart');
        } else {
            Cart::create(
                [

                    'product_id' => $this->product->id,
                    'quantity' => $this->quantity,
                    'user_id' => auth()->id(),
                    'total' => $this->quantity * $this->product->prijs,

                ]
            );

            $this->dispatch('cart_updated');
            session()->flash('message', 'Product added to cart');
        }

        return redirect()->route('cart.index');

    }

    public function render()
    {
        return view('livewire.productsdetails')->layout('layouts.app');
    }
}
