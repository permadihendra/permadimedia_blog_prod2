<?php

namespace App\Livewire\Datatables;

use Livewire\WithPagination;
use Livewire\Component;


use App\Models\User;


class UserTableWire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; //set the pagination theme to bootstrap

    public $search = '';
    public $perPage = 10;
    public $userType ='';

    public $sortBy = 'id';
    public $sortDir = 'DESC'; //Sorting direction 

    // Reset Page After Search with updated Hook
    public function updatedSearch(){
        $this->resetPage(); // resetPage() is livewire WithPagination function
    }

    public function delete(User $user){
        $user->delete();
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
        return view('livewire.datatables.user-table-wire', [
            'users' => User::search($this->search)
            ->when($this->userType !== '', function($query){
                $query->where('is_admin', $this->userType);
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage),
        ]);
    }
}
