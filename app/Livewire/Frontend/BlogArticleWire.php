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
        $this->article = Article::where('slug', $slug)->firstOrFail();
    }

    #[Layout('components.layouts.blog-article-template')]
    public function render()
    {
        return view('livewire.frontend.blog-article-wire')->with([
            'related_articles' => Article::where('category_id', $this->article->category_id)
                ->where('id', '!=', $this->article->id)
                ->orderBy('updated_at', 'DESC')
                ->take(3)
                ->get(),
        ]);
    }
}
