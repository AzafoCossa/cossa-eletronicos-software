<?php

use App\Livewire\Forms\UserForm;
use Livewire\Component;

new class extends Component
{
    public UserForm $userForm;

    public function register(){
        $this->userForm->save();
    }
};