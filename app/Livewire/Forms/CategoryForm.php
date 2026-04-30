<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryForm extends Form
{
    public ?string $name = null;
    public $category = null;

    public function save(){
        $this->validate([
            'name' => 'required|string',
            'category' => 'nullable|integer|exists:categories,id',
        ]);

        $category = new Category();
        $category->name = $this->name;
        $category->parent_id = $this->category;

        if($category->save()){
            $this->reset();
            return true;
        }
        
        return false;

    }
}
