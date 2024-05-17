<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class BlogSearchArticle extends Component
{

    public $keyword;

    public function search()
    {
        $this->dispatch('search', keyword: $this->keyword)->to(BlogAllArticles::class);
    }

    public function render()
    {
        return view('livewire.frontend.blog-search-article');
    }
}
