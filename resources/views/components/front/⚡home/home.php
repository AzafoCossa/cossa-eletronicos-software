<?php

use App\Models\Product;
use Livewire\Component;

new class extends Component
{
    public $products = [];
    
    public function mount(){
        $this->products = $this->getProducts();
    }

    private function getProducts(){
        return Product::all();
    }
};