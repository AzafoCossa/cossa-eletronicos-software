<?php

use App\Livewire\Forms\ProductVariantForm;
use App\Models\Product;
use App\Models\Supplier;
use App\Traits\ShowMessage;
use Livewire\Component;

new class extends Component
{
    use ShowMessage;

    public $showVariantForm = false;

    public $suppliers = [];
    public Product $product;

    public ProductVariantForm $productVariantForm;

    public function mount(Product $product){
        $this->productVariantForm->product = $product->id;
        $this->product = $product->load('variants');
        $this->suppliers = Supplier::all();
    }

    public function saveVariant(){
        if($this->productVariantForm->save()){
            $this->showMessage(type: 'success', message: 'Variante salva com sucesso!');
            $this->showVariantForm = false;
        }else{
            $this->showMessage(type: 'error', message: 'Ocorreu um erro ao tentar salvar a variante!');
        }
    }
};