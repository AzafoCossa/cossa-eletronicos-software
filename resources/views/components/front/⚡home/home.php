<?php

use App\Models\Product;
use App\Models\ProductVariant;
use App\Services\CartService;
use App\Traits\ShowMessage;
use Illuminate\Support\Facades\Auth;
use League\Uri\Builder;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    use ShowMessage;

    private CartService $cartService;

    public $products = [];
    
    public function boot(
        CartService $cartService
    ){
        $this->cartService = $cartService;
    }

    public function mount(){
        $this->products = $this->getProducts();
    }

    public function addToCart($product){
        $this->cartService->addItem($product['id']);
        $this->showMessage(type: 'success', message: 'O produto foi adicionado ao carrinho!');
        $this->dispatch('added-to-cart');
    }

    private function getProducts(){
        return Product::with('variant')->get();
    }
};