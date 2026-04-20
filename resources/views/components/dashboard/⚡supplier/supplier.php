<?php

use App\Livewire\Forms\SupplierForm;
use App\Models\Block;
use App\Models\Supplier;
use App\Traits\ShowMessage;
use Livewire\Component;

new class extends Component
{
    use ShowMessage;
    public $suppliers = [];
    public $blocks = [];

    public SupplierForm $supplierForm;

    public function mount(){
        $this->suppliers = $this->getSuppliers();
        $this->blocks = $this->getBlocks();
    }

    public function saveSupplier(){
        if($this->supplierForm->save()){
            $this->showMessage(type: 'success', message: 'Fornecedor salvo com sucesso!');
            $this->suppliers = $this->getSuppliers();
        }else{
            $this->showMessage(type: 'error', message: 'Erro ao salvar o fornecedor!');
        }
    }

    private function getSuppliers(){
        return Supplier::with('block.district')->get();
    }

    private function getBlocks(){
        return Block::all();
    }
};