<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

use Livewire\Attributes\Layout;

class BlogAbout extends Component
{
    #[Layout('components.layouts.blog-all-article-template')]
    public function render()
    {
        return view('livewire.frontend.blog-about');
    }
}
