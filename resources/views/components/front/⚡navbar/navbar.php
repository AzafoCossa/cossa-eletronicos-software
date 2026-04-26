<?php

use App\Services\CartService;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    private CartService $cartService;

    public $cartCount = 0;

    public function mount(){
        $this->cartCount = $this->cartService->getCartCount();
    }

    #[On('added-to-cart')]
    public function addedToCart(){
        return $this->cartCount = $this->cartService->getCartCount();
    }

    public function boot(
        CartService $cartService
    ){
        $this->cartService = $cartService;
    }
};