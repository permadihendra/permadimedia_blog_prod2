<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Livewire\Forms\UserForm;
use App\Models\User;

class UserProfileWire extends Component
{

    public UserForm $form;
    public User $user;

    public function boot(){
        $user = User::find(auth()->user()->id);
        $this->form->setUser($user);
    }

    public function update(){
        $this->form->update();

        session()->flash('success', 'User Data is updated successfully.');
        
        return $this->redirect('/user/profile', navigate: true);
    }

    public function cancel(){
        return $this->redirect('/dashboard', navigate: true);
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.user-profile');
    }
}
