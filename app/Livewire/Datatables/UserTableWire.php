<?php

namespace App\Livewire\Datatables;

use Livewire\WithPagination;
use Livewire\Component;


use App\Models\User;


class UserTableWire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 10;
    public $userType ='';

    public $sortBy = 'id';
    public $sortDir = 'DESC'; //Sorting direction 

    public function delete(User $user){
        $user->delete();
    }

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
