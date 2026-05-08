<?php

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

new class extends Component
{
    public $orders = [];
    public $myOrders = [];

    public function mount(){
        $this->getOrders();
    }

    protected function getOrders(){
        $orders = Order::with('customer', 'items', 'payments')->get();
        $this->myOrders = $orders->where('user_id', Auth::user()->id);
        $this->orders = $orders;
    }
};