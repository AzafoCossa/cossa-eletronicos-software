<?php

use App\Models\User;
use Livewire\Component;

new class extends Component
{
    public $clients = [];

    public function mount(){
        $this->getClients();
    }

    private function getClients()
    {
        return $this->clients = User::role('Customer')->get();
    }
};