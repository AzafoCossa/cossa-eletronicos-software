<?php

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use App\Traits\ShowMessage;
use Livewire\Component;

new class extends Component
{
    use ShowMessage;

    public bool $showCategoryForm = false;
    
    public $allCategories = [];
    public $categories = [];

    public CategoryForm $categoryForm;

    public function mount(){
        $this->categories = $this->getCategories()->where('parent_id', null)->load('children');
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

    public function viewCategory(Category $category)
    {
         return redirect()->route('dashboard.categories.view', $category);
    }

    private function getCategories(){
        return Category::all();
    }
};