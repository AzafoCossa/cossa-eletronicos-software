<?php

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use App\Traits\ShowMessage;
use Livewire\Component;

new class extends Component
{
    use ShowMessage;

    public bool $showCategoryForm = false;

    public Category $category;

    public CategoryForm $categoryForm;

    public function mount(Category $category)
    {
        $this->categoryForm->category = $category->id;

        $this->category = $category->load('children');
    }

    public function saveCategory(){
        if($this->categoryForm->save()){
            $this->showMessage(type: 'Success', message: 'Categoria salva com sucesso!');
            $this->showCategoryForm = false;
            $this->category->refresh();

        }else{
            $this->showMessage(type: 'Error', message: 'Erro ao salvar categoria!');
        }
    }


    public function viewCategory(Category $category)
    {
         return redirect()->route('dashboard.categories.view', $category);
    }
};