<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;

class UserWire extends Component
{

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.user-wire');
    }
}
