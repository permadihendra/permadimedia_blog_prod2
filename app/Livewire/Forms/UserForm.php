<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

use App\Models\User;

class UserForm extends Form
{
    public ?User $user;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function rules(){
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        return $rules;
    }

    public function store(){
        $validated = $this->validate();

        User::create($validated);
        
    }

    public function delete($id){
        
        User::find($id)->delete();
    }
}
