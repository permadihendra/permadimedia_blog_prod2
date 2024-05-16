<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Models\Article;

class BlogArticleWire extends Component
{

    public $article;

    public function mount($slug)
    {
        $this->article = Article::where('slug', $slug)->first();
    }

    #[Layout('components.layouts.blog-article-template')]
    public function render()
    {
        return view('livewire.frontend.blog-article-wire');
    }
}
