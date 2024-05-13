<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;

class BlogWire extends Component
{
    #[Layout('components.layouts.blog-template')]
    public function render()
    {
        return view('livewire.frontend.blog-wire');
    }
}
