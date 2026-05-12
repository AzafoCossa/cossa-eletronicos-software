<?php

use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public $payment_confirmation;

    public $order;
    
    public function mount(Order $order){
        $this->order = $order->load('items.variant', 'address');
    }

    public function addPayment(){
        $this->validate([
            'payment_confirmation' => 'required|file'        
        ]);
        try{
            $payment_path = $this->payment_confirmation->store('payments');
            $this->order->payments()->create([
                'payment_proof' => $payment_path,
            ]);

            return redirect()->route('orders');
        }catch(\Exception $e){
            Log::error("Ocorreu um erro ao tentar submeter o pagamento: {$e}");
        }
    }
};