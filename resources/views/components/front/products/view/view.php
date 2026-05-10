<?php

use App\Models\Product;
use App\Services\CartService;
use App\Traits\ShowMessage;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

new class extends Component
{
    use ShowMessage;
    
    private CartService $cartService;

    public $product;
    public $variant_index = null;

    public function mount(Product $product){
        $this->product = $product->load('variants');
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

    public function goBack(){
        back();
    }

    public function boot(
        CartService $cartService
    ){
        $this->cartService = $cartService;
    }
};