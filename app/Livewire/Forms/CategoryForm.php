<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryForm extends Form
{
    public ?string $name;

    public function save(){
        $this->validate([
            'name' => 'required|string',
        ]);

        $category = new Category();
        $category->name = $this->name;

        if($category->save()){
            $this->reset();
            return true;
        }
        
        return false;

    }
}
