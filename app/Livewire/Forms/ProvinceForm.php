<?php

namespace App\Livewire\Forms;

use App\Models\Province;
use Illuminate\Support\Facades\Log;
use Livewire\Form;

class ProvinceForm extends Form
{
    public ?string $name;

    public function save(){
        $this->validate([
            'name' => 'required|unique:provinces,name',
        ]);

        $province = new Province();
        $province->name = $this->name;

        if($province->save()){
            $this->reset();
            return true;
        }

        return false;
    }
}
