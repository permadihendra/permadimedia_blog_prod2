<?php

namespace App\Livewire\Datatables;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Article;
use App\Models\Category;

class ArticleTableWire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; //set the pagination theme to bootstrap

    public $search = ''; //query the search input from search wire:model
    public $perPage = 10; //set default per page article = 10, with wire:model on select
    public $status = ''; //query by status, with wire:model on select
    public $categoryFilter = ''; //query by category

    public $sortBy = 'updated_at'; //default sort by
    public $sortDir = 'DESC'; //Sorting direction 

    public $categories;

    public function boot(){
        $this->categories = Category::orderBy('name')->get();
    }

     // Reset Page After Search with updated Hook
     public function updatedSearch(){
        $this->resetPage(); // resetPage() is livewire WithPagination function
    }

    // function to retrieve wire:model Sortby when the columns title is clicked
    public function setSortBy($sortBy){
        if ($this->sortBy === $sortBy){
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            return;
        }

        $this->sortBy = $sortBy;
        $this->sortDir = 'DESC';
    }
    

    public function render()
    {

        // to implement search , need to add scopeSearch function in the model
        return view('livewire.datatables.article-table-wire', [
            'articles' => Article::search($this->search)
            ->when($this->status !== '' || $this->categoryFilter !== '', function($query){
                $query->where('status', $this->status)->orWhere('category_id', $this->categoryFilter);  // If $this->status not empty then run the where query
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage)
            ,

            'categories' => $this->categories,
        ]);
    }
}
