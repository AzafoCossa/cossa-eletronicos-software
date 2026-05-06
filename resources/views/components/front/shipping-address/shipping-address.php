<?php

use App\Livewire\Forms\ShippingForm;
use App\Models\District;
use App\Services\CartService;
use App\Services\OrderService;
use App\Traits\ShowMessage;
use Livewire\Component;

new class extends Component
{
    use ShowMessage;

    public $cart;
    public $districts = [];

    public ShippingForm $shippingForm;

    private $cartService;
    private $orderService;

    public function mount()
    {
        $this->cart = $this->cartService->getCart();

        if($this->cart['items']->isEmpty()){
            return redirect()->route('home');
        }

        $this->districts = District::where('is_covared', true)->get();
        $this->shippingForm->full_name = auth()->user()->full_name;
    }

    public function finalizePurchase(){
        $shippingAddress = $this->shippingForm->save();

        if($shippingAddress->exists){
            $order = $this->orderService->store($this->cartService->getCart(), $shippingAddress);

            if($order){
                $this->cartService->clearcart();
                return redirect()->route('order-success')->with('order-placed', 'Os seus produtos foram reservados com sucesso.');
            }
        }

        $this->showMessage(type: 'error', message: 'Nao foi possivel reservar os itens.');
        return;
    }

    public function boot(
        CartService $cartService,
        OrderService $orderService,
    ){
        $this->cartService = $cartService;
        $this->orderService = $orderService;
    }
};