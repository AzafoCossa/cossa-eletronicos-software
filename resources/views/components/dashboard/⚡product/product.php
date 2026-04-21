<?php

use App\Livewire\Forms\CategoryForm;
use App\Livewire\Forms\ProductForm;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ShowMessage;
use Livewire\Component;

new class extends Component
{
    use ShowMessage;

    public bool $showCategoryForm = false;
    public bool $showProductForm = false;

    public $allCategories = [];
    public $categories = [];
    public $products = [];

    public ProductForm $productForm;
    public CategoryForm $categoryForm;

    public function mount(){
        $this->allCategories = $this->getCategories();
        $this->categories = $this->getCategories()->where('parent_id', null)->load('children');
        $this->products = $this->getProducts();
    }

    public function saveProduct(){
        if($this->productForm->save()){
            $this->showMessage(type: 'Success', message: 'Produto salvo com sucesso!');
            $this->showProductForm = false;
            $this->products = $this->getProducts();
        }else{
            $this->showMessage(type: 'Error', message: 'Erro ao salvar produto!');
        }
    }

    public function saveCategory(){
        if($this->categoryForm->save()){
            $this->showMessage(type: 'Success', message: 'Categoria salva com sucesso!');
            $this->showCategoryForm = false;
            $this->categories = $this->getCategories();

        }else{
            $this->showMessage(type: 'Error', message: 'Erro ao salvar categoria!');
        }
    }

    private function getProducts(){
        return Product::with('category')->get();
    }

    private function getCategories(){
        return Category::all();
    }
};