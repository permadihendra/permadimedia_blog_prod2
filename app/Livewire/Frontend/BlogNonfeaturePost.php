<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

use App\Models\Article;

class BlogNonfeaturePost extends Component
{
    use WithPagination;

    public $keyword;

    #[On('search')]
    public function getArticle($keyword)
    {
        $this->keyword = $keyword;
    }

    public function render()
    {
        return view('livewire.frontend.blog-nonfeature-post')->with([
            'popularArticle' => Article::with(['category', 'user'])->search($this->keyword)->where('status', 1)->orderBy('views', 'DESC')->paginate(6),
        ]);
    }
}
