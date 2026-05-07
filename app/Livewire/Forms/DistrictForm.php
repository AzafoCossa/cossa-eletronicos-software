<?php

namespace App\Livewire\Forms;

use App\Models\District;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DistrictForm extends Form
{
    public ?int $id = null;
    public ?int $province = null;
    public ?string $name = null;
    public bool $is_covered = false;

    public function save(){
        $this->validate([
            'province' => 'required|exists:provinces,id',
            'name' => 'required|string|max:255',
            'is_covered' => 'nullable|boolean',
        ]);

        $district = new District();
        $district->province_id = $this->province;
        $district->name = $this->name;
        $district->is_covared = $this->is_covered;
        
        if($district->save()){
            $this->reset();
            return true;
        }

        return false;
    }
}
