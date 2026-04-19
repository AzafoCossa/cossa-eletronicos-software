<?php

use App\Livewire\Forms\BlockForm;
use App\Livewire\Forms\DistrictForm;
use App\Livewire\Forms\ProvinceForm;
use App\Models\Block;
use App\Models\District;
use App\Models\Province;
use Livewire\Component;
use App\Traits\ShowMessage;

new class extends Component
{
    use ShowMessage;
    public $provinces = [];
    public $districts = [];
    public $blocks = [];
    
    public ProvinceForm $provinceForm;
    public DistrictForm $districtForm;
    public BlockForm $blockForm;

    public function mount(){
        $this->provinces = $this->getProvinces();
        $this->districts = $this->getDistricts();
        $this->blocks = $this->getBlocks();
    }

    public function saveProvince(){
        if($this->provinceForm->save()){
            $this->showMessage(type: 'success', message: 'Provincia adicionada com sucesso!');
            $this->provinces = $this->getProvinces();
        } else {
            $this->showMessage(type: 'error', message: 'Ocorreu um erro ao adicionar a provincia.');
        };
    }

    public function saveDistrict(){
        if($this->districtForm->save()){
            $this->showMessage(type: 'success', message: 'Distrito adicionado com sucesso!');
            $this->districts = $this->getDistricts();
        } else {
            $this->showMessage(type: 'error', message: 'Ocorreu um erro ao adicionar o distrito.');
        }
    }

    public function saveBlock(){
        if($this->blockForm->save()){
            $this->showMessage(type: 'success', message: 'Bairro adicionado com sucesso!');
            $this->blocks = $this->getBlocks();
        } else {
            $this->showMessage(type: 'error', message: 'Ocorreu um erro ao adicionar o bairro.');
        }
    }

    private function getDistricts(){
        return District::with('province')->get();
    }

    private function getBlocks(){
        return Block::with('district.province')->get();
    }

    private function getProvinces(){
        return Province::all();
    }

};