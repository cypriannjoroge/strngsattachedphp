<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomepageComponent extends Component
{
    public function render()
    {
        $products = Product::all();

        return view('livewire.homepage-component',[
            'products' => Product::all()]);
    }
    
}
