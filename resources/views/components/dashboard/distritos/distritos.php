<?php

use App\Livewire\Forms\DistrictForm;
use App\Models\District;
use App\Models\Province;
use App\Traits\ShowMessage;
use Livewire\Component;

new class extends Component
{
    use ShowMessage;
    public $districts = [];
    public $provinces = [];
    public DistrictForm $districtForm;

    public function mount(){
        $this->districts = $this->getDistricts();
        $this->provinces = $this->getProvinces();
    }

    public function saveDistrict(){
        if($this->districtForm->save()){
            $this->showMessage(type: 'success', message: 'Distrito adicionado com sucesso!');
            $this->districts = $this->getDistricts();
        } else {
            $this->showMessage(type: 'error', message: 'Ocorreu um erro ao adicionar o distrito.');
        }
    }

    private function getDistricts(){
        return District::with('province')->get();
    }

    private function getProvinces(){
        return Province::all();
    }
};