<?php

namespace App\Livewire\Forms;

use App\Models\ProductVariant;
use App\Models\StockBatch;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StockForm extends Form
{
    public $quantity = null;
    public $variant = null;
    public $price = null;
    public $sale_price = null;

    public function save(){
        $this->validate([
            'quantity' => 'required|integer',
            'variant' => 'required|exists:product_variants,id',
            'price' => 'required|numeric',
            'sale_price' => 'required|integer',
        ]);

        $stock = new StockBatch();
        $stock->total_quantity = $this->quantity;
        $stock->quantity_remaining = $this->quantity;
        $stock->cost_price = $this->price * 100;
        $stock->product_variant_id = $this->variant;

        if($stock->save()){

            $variant = ProductVariant::where('id', $this->variant)->first();
            $variant->stock = $stock->total_quantity;
            $variant->price = $this->sale_price;
            $variant->save();

            $this->reset();
            return true;
        }

        return false;
    }
}
