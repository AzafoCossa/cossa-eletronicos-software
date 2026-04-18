<?php

use App\Livewire\Forms\ProvinceForm;
use App\Models\Province;
use Livewire\Component;

new class extends Component
{
    public $provinces = [];

    public ProvinceForm $provinceForm;

    public function mount(){
        $this->provinces = Province::all();
    }

    public function saveProvince(){
        $this->provinceForm->save();
    }
};