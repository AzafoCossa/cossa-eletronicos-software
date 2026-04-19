<?php

namespace App\Livewire\Forms;

use App\Models\Block;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BlockForm extends Form
{
    public ?string $name;
    public ?int $district;

    public function save(){
        $this->validate([
            'name' => 'required|string|max:255',
            'district' => 'required|exists:districts,id',
        ]);

        $block = new Block();
        $block->name = $this->name;
        $block->district_id = $this->district;
        
        if($block->save()){
            $this->reset();
            return true;
        } else {
            return false;
        }
    }
}
