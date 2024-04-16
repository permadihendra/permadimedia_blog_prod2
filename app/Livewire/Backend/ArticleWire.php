<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Models\Article;

class ArticleWire extends Component
{

    public $articles;

    public $title, $desc, $img, $publish_date;

    public function store(Article $article) {
        $article->title = $this->title;
        $article->desc = $this->desc;
        $article->img = $this->img;
        $article->publish_date = $this->publish_date;

        dump($article);
    }

    public function boot(){
        $this->articles = Article::latest()->get();
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.article-wire');
    }
}
