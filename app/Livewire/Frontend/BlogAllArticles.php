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
    public $category_id = ''; //must defined empty string

    #[On('search')]
    public function getArticle($keyword)
    {
        // dump($keyword);
        $this->keyword = $keyword;
    }


    #[On('get-article-by-category')]
    public function getArticleByCategory($slug)
    {
        // dump($slug);
        $this->category_id = $slug;
    }
    #[Layout('components.layouts.blog-all-article-template')]
    public function render()
    {
        return view('livewire.frontend.blog-all-articles')->with([
            'articles' => Article::search($this->keyword)
                ->where('status', 1)->orderBy('created_at', 'DESC')
                ->when($this->category_id !== '', function ($query) {
                    $query->where('category_id', $this->category_id);
                })
                ->paginate(8),
        ]);
    }
}
