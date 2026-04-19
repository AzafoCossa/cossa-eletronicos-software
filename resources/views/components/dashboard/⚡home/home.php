<?php

use App\Livewire\Forms\ProvinceForm;
use App\Models\Province;
use Livewire\Component;

new class extends Component
{
    public $provinces = [];
    public bool $showMessage = false;
    public string $messageType = 'success';
    public string $message = '';

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

    private function showMessage(string $type, string $message){
        $this->dispatch('show-message', message: $message, type: $type);
    }
};