<?php

use App\Livewire\Forms\UserForm;
use Illuminate\Support\Sleep;
use Livewire\Component;

new class extends Component
{
    public UserForm $userForm;

    public function register(){

        if(!$this->userForm->save()){
            $this->dispatch('show-message', type: 'error', message: 'Erro ao registrar usuário!');
            return;
        }
        
        $this->dispatch('show-message', type: 'success', message: 'Registrado com sucesso!');
        
        Sleep::for(1.5)->seconds();
        return redirect()->route('login');
    }
};