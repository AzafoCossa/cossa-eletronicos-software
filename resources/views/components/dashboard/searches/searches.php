<?php

use App\Models\SearchTerm;
use Livewire\Component;

new class extends Component
{
    public $searches;

    public function mount()
    {
        $this->getSearches();
    }
    
    private function getSearches()
    {
        return $this->searches = SearchTerm::orderBy('search_count', 'desc')->orderBy('results_count', 'asc')->get();
    }
};