<?php

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use App\Traits\ShowMessage;
use Livewire\Component;

new class extends Component
{
    use ShowMessage;

    public $categories = [];

    public CategoryForm $categoryForm;

    public function mount(){
        $this->categories = $this->getCategories();
    }

    public function saveCategory(){
        if($this->categoryForm->save()){
            $this->showMessage(type: 'Success', message: 'Categoria salva com sucesso!');
            $this->categories = $this->getCategories();
        }else{
            $this->showMessage(type: 'Error', message: 'Erro ao salvar categoria!');
        }
    }

    private function getCategories(){
        return Category::where('parent_id', null)->with('children')->get();
    }
};