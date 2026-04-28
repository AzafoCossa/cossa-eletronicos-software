<?php

use App\Services\CartService;
use Livewire\Component;

new class extends Component
{
    private CartService $cartService;
    public $cart;

    public function mount()
    {
        $this->cart = $this->cartService->getCart();
    }

    public function boot(
        CartService $cartService
    ){
        $this->cartService = $cartService;
    }
};