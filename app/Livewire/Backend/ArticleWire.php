<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Models\Article;

class ArticleWire extends Component
{

    public $articles;

    public function boot(){
        $this->articles = Article::latest()->get();
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.article-wire');
    }
}
