<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Article;

class BlogNonfeaturePost extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.frontend.blog-nonfeature-post')->with([
            'popularArticle' => Article::where('status',1)->orderBy('views', 'DESC')->paginate(6),
        ]);
    }
}
