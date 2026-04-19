<?php

namespace App\Livewire\Forms;

use App\Models\District;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DistrictForm extends Form
{
    public ?int $province = null;
    public ?string $name = null;

    public function save(){
        $this->validate([
            'province' => 'required|exists:provinces,id',
            'name' => 'required|string|max:255',
        ]);

        $district = new District();
        $district->province_id = $this->province;
        $district->name = $this->name;
        
        if($district->save()){
            $this->reset();
            return true;
        }

        return false;
    }
}
