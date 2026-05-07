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

    public bool $openDistrictModal = false;
    public bool $editMode = false;

    public function mount(){
        $this->districts = $this->getDistricts();
        $this->provinces = $this->getProvinces();
    }

    public function editDistrict(District $district){
        $this->openDistrictModal = true;
        $this->editMode = true;

        $this->districtForm->fill([
            'id' => $district->id,
            'province' => $district->province_id,
            'name' => $district->name,
            'is_covered' => $district->is_covared,
        ]);
    }

    public function saveDistrict(){
        if($this->districtForm->save()){
            $this->showMessage(type: 'success', message: 'Distrito adicionado com sucesso!');
            $this->districts = $this->getDistricts();
        } else {
            $this->showMessage(type: 'error', message: 'Ocorreu um erro ao adicionar o distrito.');
        }
    }

    public function updateDistrict(){
        if($this->districtForm->update()){
            $this->showMessage(type: 'success', message: 'Distrito atualizado com sucesso!');
            $this->districts = $this->getDistricts();
            $this->editMode = false;
            $this->openDistrictModal = false;
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