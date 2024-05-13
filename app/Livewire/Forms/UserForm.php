<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

use App\Models\User;

class UserForm extends Form
{
    public ?User $user;

    public $id;
    public $name;
    public $email;
    public $role_id, $role;
    public $is_active;
    public $password;
    public $old_password;
    public $password_confirmation;

    public function rules(){
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        return $rules;
    }

    public function setUser(User $user){
        $this->user = $user;
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
        $this->role = $user->role->name;
        $this->is_active = $user->is_active;
        $this->password = '';
    }

    public function update(){
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'], //'unique:users'
            'role_id' => ['required'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['nullable', 'string', 'min:8', 'required_with:password'],
        ]);

        // dump($this->all());

        $this->user->update($this->all());
    }

    public function store(){
        $validated = $this->validate();

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        $this->reset();
        
    }

    public function delete($id){
        
        User::find($id)->delete();
    }
}
