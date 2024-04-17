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

    public function render()
    {
        return view('livewire.datatables.user-table-wire', [
            'users' => User::search($this->search)
            ->when($this->userType !== '', function($query){
                $query->where('is_admin', $this->userType);
            })
            ->paginate($this->perPage),
        ]);
    }
}
