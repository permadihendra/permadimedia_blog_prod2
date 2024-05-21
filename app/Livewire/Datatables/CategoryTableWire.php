<?php

namespace App\Livewire\Datatables;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Category;

class CategoryTableWire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; //set the pagination theme to bootstrap 

    public $search = '';
    public $perPage = 10;

    public $sortBy = 'name';
    public $sortDir = 'ASC'; //Set the sort direction

    // Reset Page After Search with updated Hook
    public function updatedSearch()
    {
        $this->resetPage(); // resetPage() is livewire WithPagination function
    }

    // function to retrieve wire:model Sortby when the columns title is clicked
    public function setSortBy($sortBy)
    {
        if ($this->sortBy === $sortBy) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            return;
        }

        $this->sortBy = $sortBy;
        $this->sortDir = 'DESC';
    }

    public function render()
    {
        return view('livewire.datatables.category-table-wire')->with([
            'categories' => Category::search($this->search)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
        ]);
    }
}
