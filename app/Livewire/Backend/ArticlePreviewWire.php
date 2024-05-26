<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Models\Article;

class ArticlePreviewWire extends Component
{
    public $article;

    public function mount(Article $article)
    {
        $this->article = Article::where('slug', $article->slug)->firstOrFail();
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.article-preview-wire');
    }
}
