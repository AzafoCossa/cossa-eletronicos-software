<?php

use App\Livewire\Forms\CategoryForm;
use App\Livewire\Forms\ProductForm;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ShowMessage;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use ShowMessage, WithFileUploads;

    public bool $showCategoryForm = false;
    public bool $showProductForm = false;

    public $categories = [];
    public $products = [];

    public ProductForm $productForm;
    public CategoryForm $categoryForm;

    public function mount(){
        $this->categories = $this->getCategories();
        $this->products = $this->getProducts();
    }

    public function saveProduct(){
        if($this->productForm->save()){
            $this->showMessage(type: 'success', message: 'Produto salvo com sucesso!');
            $this->showProductForm = false;
            $this->products = $this->getProducts();
        }else{
            $this->showMessage(type: 'error', message: 'Erro ao salvar produto!');
        }
    }

    public function saveCategory(){
        if($this->categoryForm->save()){
            $this->showMessage(type: 'success', message: 'Categoria salva com sucesso!');
            $this->showCategoryForm = false;
            $this->categories = $this->getCategories();

        }else{
            $this->showMessage(type: 'error', message: 'Erro ao salvar categoria!');
        }
    }

    // public function adicionarImagem(){
    //     $this->productForm->images[] = [
    //         'path' => null,
    //         'is_primary' => false,
    //     ];
    // }

    // public function removerImagem($index){
    //     unset($this->productForm->images[$index]);
    //     $this->productForm->images = array_values($this->productForm->images);
    // }

    private function getProducts(){
        return Product::with('category')->get();
    }

    private function getCategories(){
        return Category::all();
    }
};