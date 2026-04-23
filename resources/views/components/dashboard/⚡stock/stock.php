<?php

use App\Livewire\Forms\StockForm;
use App\Models\ProductVariant;
use App\Models\StockBatch;
use App\Traits\ShowMessage;
use Livewire\Component;

new class extends Component
{
    use ShowMessage;

    public $showStockForm = false;

    public $productVariants = [];
    public $stockBatches = [];

    public StockForm $stockForm;

    public function mount(){
        $this->productVariants = ProductVariant::with('product')->get();
        $this->getStocks();
    }

    public function saveStock(){
        if($this->stockForm->save()){
            $this->showStockForm = false;
            $this->showMessage(type: 'success', message: 'Estoque salvo com sucesso!');
            $this->getStocks();
        }else{
            $this->showMessage(type: 'error', message: 'Ocorreu um erro ao tentar salvar estoque!');
        }
    }

    private function getStocks(){
        return $this->stockBatches = StockBatch::where('quantity_remaining', '>', 0)->with('variant.product.category')->get();
    }
};