<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $cart = [];

    public function addToCart($product)
    {

        $this->cart[] = $product;

        session()->flash('message', 'Product added to cart');

        $product = Product::find($product);

    }

    public function render()
    {

        $products = Product::paginate(12);

        return view('livewire.product-index', ['products' => $products])
            ->layout('layouts.app');
    }
}
