<?php

namespace App\Livewire\Forms;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ProductForm extends Form
{
    use WithFileUploads;

    public ?int $id = null;
    public ?string $name;
    public ?int $category;
    public $imageFile;

    public function save():bool
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'imageFile' => 'required|file|image|mimes:jpeg,png|max:5120',
        ]);

        try{
            DB::transaction(function(){
                $product = new Product();
                $product->name = $this->name;
                $product->category_id = $this->category;
                $product->save();

                $imagePath = $this->imageFile->store('products', 'public');

                $image = new Image();
                $image->path = $imagePath;
                $image->is_primary = true;

                $product->images()->save($image);
            });

            $this->reset();

            return true;
        }catch(\Exception $e){
            Log::error('Erro ao salvar produto: ' . $e->getMessage());

            throw ValidationException::withMessages([
                'product_error' => 'Nao foi possivel salvar o produto!'
            ]);
            return false;
        }
    }
}
