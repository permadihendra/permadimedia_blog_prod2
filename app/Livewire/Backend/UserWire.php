<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Livewire\Forms\UserForm;
use App\Models\User;

class UserWire extends Component
{

    public UserForm $form;
    public User $user;


    public function store(){
    
        $this->form->store();

        session()->flash('success', 'New User is created successfully.');
        
        return $this->redirect('/users', navigate: true);
    }

    public function delete(User $user){
        $this->form->delete($user->id);

        session()->flash('success', 'User is deleted successfully.');
        
        return $this->redirect('/users', navigate: true);
    }

    public function cancel(){
        return $this->redirect('/users', navigate: true);
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.user-wire');
    }
}
