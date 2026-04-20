<?php

namespace App\Livewire\Forms;

use App\Models\Supplier;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SupplierForm extends Form
{
    public ?string $name;
    public ?int $block;
    public ?string $address;
    public ?string $description;

    public function save(){
        $this->validate([
            'name' => 'required|string',
            'block' => 'required|exists:blocks,id',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $supplier = new Supplier();
        $supplier->name = $this->name;
        $supplier->block_id = $this->block;
        $supplier->address = $this->address;
        $supplier->description = $this->description;

        if($supplier->save()){
            return true;
        } else {
            return false;
        }
    } 
}
