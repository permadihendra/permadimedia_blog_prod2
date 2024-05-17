<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

use App\Models\Article;

class BlogAllArticles extends Component
{
    use WithPagination;

    public $keyword;

    #[On('search')]
    public function getArticle($keyword)
    {
        // dump($keyword);
        $this->keyword = $keyword;
    }

    #[Layout('components.layouts.blog-all-article-template')]
    public function render()
    {
        return view('livewire.frontend.blog-all-articles')->with([
            'articles' => Article::search($this->keyword)->where('status', 1)->orderBy('created_at', 'DESC')->paginate(8),
        ]);
    }
}
