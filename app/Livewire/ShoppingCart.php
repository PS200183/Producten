<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class ShoppingCart extends Component
{
    protected $listeners = ['cart_updated' => 'render'];

    public $cartitems;

    public $total;

    public function removeItem($id)
    {
        $cartitem = Cart::find($id);
        $cartitem->delete();
        $this->dispatch('cart_updated');
    }

    public function updateQuantity($id)
    {

        $cartitem = Cart::find($id);

        $cartitem->update(['quantity' => $cartitem->quantity + 1]);
        $cartitem->update(['total' => $cartitem->quantity * $cartitem->product->prijs]);

    }

    public function minusQuantity($id)
    {

        $cartitem = Cart::find($id);

        if ($cartitem->quantity == 1) {
            session()->flash('error', 'Mag niet 0 zijn!');
        } else {
            $cartitem->update(['quantity' => $cartitem->quantity - 1]);
            $cartitem->update(['total' => $cartitem->quantity * $cartitem->product->prijs]);
        }

    }

    public function removeFromCart($id)
    {
        $cartitem = Cart::find($id);
        $cartitem->delete();
        $cartitem->update(['total' => $cartitem->quantity * $cartitem->product->prijs]);

    }

    public function render()
    {
        $this->cartitems = Cart::where('user_id', auth()->id())->get();
        $this->total = 0;

        foreach ($this->cartitems as $item) {
            $this->total += $item->total;

        }

        return view('livewire.shopping-cart')->layout('layouts.app');
    }
}
