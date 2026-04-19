<?php

use App\Livewire\Forms\DistrictForm;
use App\Livewire\Forms\ProvinceForm;
use App\Models\District;
use App\Models\Province;
use Livewire\Component;
use App\Traits\ShowMessage;

new class extends Component
{
    use ShowMessage;
    public $provinces = [];
    public $districts = [];
    
    public ProvinceForm $provinceForm;
    public DistrictForm $districtForm;

    public function mount(){
        $this->provinces = Province::all();
        $this->districts = District::all();
    }

    public function saveProvince(){
        if($this->provinceForm->save()){
            $this->showMessage(type: 'success', message: 'Provincia adicionada com sucesso!');
            $this->provinces = Province::all();
        } else {
            $this->showMessage(type: 'error', message: 'Ocorreu um erro ao adicionar a provincia.');
        };
    }

    public function saveDistrict(){
        if($this->districtForm->save()){
            $this->showMessage(type: 'success', message: 'Distrito adicionado com sucesso!');
            $this->districts = District::all();
        } else {
            $this->showMessage(type: 'error', message: 'Ocorreu um erro ao adicionar o distrito.');
        }
    }

};