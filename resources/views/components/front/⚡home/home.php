<?php

use App\Models\Product;
use App\Models\ProductVariant;
use App\Services\CartService;
use App\Traits\ShowMessage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        try{
            $this->cartService->addItem($product['id']);
            $this->showMessage(type: 'success', message: 'O produto foi adicionado ao carrinho!');
            $this->dispatch('added-to-cart');
        }catch(\Exception $e){
            Log::error("Nao foi possivel adicionar item ao stock: {$e}");
            $this->showMessage(type: 'error', message: 'Nao foi possivel adcionar item ao carrinho!');
        }
    }

    private function getProducts(){
        return Product::whereHas('variant', function(Builder $query){
            $query->where('stock', '>', 0);
        })->get();
    }
};