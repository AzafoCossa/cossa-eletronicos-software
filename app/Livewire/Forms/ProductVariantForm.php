<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use App\Models\ProductVariant;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductVariantForm extends Form
{
    public $id = null;
    public $color = null;
    public $name = null;
    public ?string $description = null;
    public $sku = null;
    public $price = null;
    public $supplier = null;
    public bool $is_new = false;
    public $product = null;

    public function save(){
        $this->validate(
            [        
                'id' => 'nullable|int',    
                'supplier' => 'nullable|exists:suppliers,id',
                'name' => 'required|string',
                'description' => 'nullable|string',
                'price' => 'nullable|int',
                'sku' => 'nullable|string',
                'color' => 'nullable|string',
                'product' => 'required|exists:products,id',
            ]
        );

        $parentProduct = Product::findOrFail($this->product);

        $variant = new ProductVariant();
        $variant->name = $this->name;
        $variant->description = $this->description;
        $variant->product_id = $this->product;
        $variant->supplier_id = $this->supplier;
        $variant->is_new = $this->is_new;
        $variant->color = $this->color;
        $variant->sku = $this->sku;
        $variant->full_name = $parentProduct->name .' '.$this->name;

        if($variant->save()){
            $this->reset();
            return true;
        }

        return false;
    }

}
