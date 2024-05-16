<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class BlogSearch extends Component
{
    public $keyword;

    public function search()
    {
        $this->dispatch('search', keyword: $this->keyword)->to(BlogNonfeaturePost::class);
    }


    public function render()
    {
        return view('livewire.frontend.blog-search');
    }
}
