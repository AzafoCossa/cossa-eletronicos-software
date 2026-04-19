<?php

use App\Livewire\Forms\ProvinceForm;
use App\Models\Province;
use Livewire\Component;
use App\Traits\ShowMessage;

new class extends Component
{
    use ShowMessage;
    public $provinces = [];
    
    public ProvinceForm $provinceForm;

    public function mount(){
        $this->provinces = Province::all();
    }

    public function saveProvince(){
        if($this->provinceForm->save()){
            $this->showMessage(type: 'success', message: 'Provincia adicionada com sucesso!');
            $this->provinces = Province::all();
        } else {
            $this->showMessage(type: 'error', message: 'Ocorreu um erro ao adicionar a provincia.');
        };
    }

};