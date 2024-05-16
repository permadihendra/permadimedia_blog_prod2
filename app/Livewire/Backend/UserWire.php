<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use App\Models\Roles;

class UserWire extends Component
{

    public UserForm $form;
    public User $user;
    public $roles;


    public function boot()
    {
        $this->roles = Roles::get();
    }


    public function edit(User $user)
    {
        $this->form->setUser($user);
    }

    public function update()
    {
        $this->form->update();

        session()->flash('success', 'User Data is updated successfully.');

        return $this->redirect('/users', navigate: true);
    }


    public function store()
    {

        $this->form->store();

        session()->flash('success', 'New User is created successfully.');

        return $this->redirect('/users', navigate: true);
    }

    public function delete(User $user)
    {

        // dump($user->role->name);

        if ($user->role->name == 'administrator') {

            session()->flash('success', 'User role is ' . $user->role->name . ', can not be deleted');

            return $this->redirect('/users', navigate: true);
        } else {
            $this->form->delete($user->id);

            session()->flash('success', 'User is deleted successfully.');

            return $this->redirect('/users', navigate: true);
        }
    }

    public function cancel()
    {
        return $this->redirect('/users', navigate: true);
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.user-wire');
    }
}
