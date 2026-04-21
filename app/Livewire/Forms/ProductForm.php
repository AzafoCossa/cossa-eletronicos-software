<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{
    public ?int $id = null;
    public ?string $name;
    public ?string $description;
    public ?int $category;

    public function save():bool
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|exists:categories,id',
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->description = $this->description;
        $product->category_id = $this->category;

        if($product->save()){
            $this->reset();
            return true;
        }

        return false;
    }
}
