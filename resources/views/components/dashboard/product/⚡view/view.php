<?php

use App\Livewire\Forms\ProductVariantForm;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Supplier;
use App\Traits\ShowMessage;
use Livewire\Component;

new class extends Component
{
    use ShowMessage;

    public $showVariantForm = false;
    public $editMode = false;

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

    public function updateVariant(){
        if($this->productVariantForm->update()){
            $this->showMessage(type: 'success', message: 'Variante atualizada com sucesso!');
            $this->showVariantForm = false;
            $this->editMode = false;
        }else{
            $this->showMessage(type: 'error', message: 'Ocorreu um erro ao tentar salvar a variante!');
        }
    }

    public function editVariant(ProductVariant $variant){
        $this->showVariantForm = true;
        $this->editMode = true;
        $this->productVariantForm->fill([
            'id' => $variant->id,
            'color' => $variant->color,
            'name' => $variant->name,
            'description' => $variant->description,
            'sku' => $variant->sku,
            'price' => $variant->price,
            'supplier' => $variant->supplier_id,
            'is_new' => $variant->is_new,
            'product' => $this->product->id,
        ]);
    }
};