<?php

use App\Models\Order;
use Livewire\Component;

new class extends Component
{
    public $orders = [];

    public function mount(){
        $this->orders = Order::where('user_id', auth()->user()->id)->get();
    }

    public function viewOrder(Order $order){
        return redirect()->route('orders.order', $order);
    }
};