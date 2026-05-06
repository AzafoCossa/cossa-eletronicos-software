<?php

use App\Models\CartItem;
use App\Services\CartService;
use App\Traits\ShowMessage;
use Illuminate\Support\Arr;
use Livewire\Component;

new class extends Component
{
    use ShowMessage;

    private CartService $cartService;
    public $cart;

    public function mount()
    {
        $this->cart = $this->cartService->getCart();
    }

    public function finalizePurchase()
    {
        if($this->cart['items']->isEmpty()){
            $this->showMessage(type:'error', message:'Coloque alguns items no cesto para proceguir.');
            return;
        }
        return redirect()->route('shipping-address');
    }

    public function addItem(CartItem $item){
        try{
            $this->cartService->addItem($item->product_variant_id);
            $this->showMessage(type:'success', message:'Item atualizado com sucesso');
            $this->cart = $this->cartService->getCart();
        }catch(\Exception $e){
            $this->showMessage(type:'error', message:'Nao foi possivel acrescentar a quantidade');
        }
    }

    public function removeItem(CartItem $item){
        $cartItem = Arr::first($this->cart['items'], function($value) use ($item){
            if($value['id'] === $item->id) return $value;
        });

        if($cartItem['quantity'] > 1){
            $qty = --$cartItem['quantity'];
            $this->cartService->updateItem($cartItem['id'], $qty);

            $this->showMessage(type:'success', message:'O item foi removido');

            return $this->cart = $this->cartService->getCart();
        }else{
            $item = CartItem::where('id', $cartItem['id'])->first();
            $this->deleteItem($item);
        }
    }

    public function deleteItem(CartItem $item){
        $cartItem = Arr::first($this->cart['items'], function($value) use ($item){
            if($value['id'] === $item->id) return $value;
        });

        $this->cartService->updateItem($cartItem['id'], -1);
        $this->showMessage(type:'success', message:'Item removido com sucesso');
        $this->cart = $this->cartService->getCart();
    }

    public function boot(
        CartService $cartService
    ){
        $this->cartService = $cartService;
    }
};