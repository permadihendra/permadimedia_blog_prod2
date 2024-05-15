<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

use App\Models\Article;

class BlogNonfeaturePost extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog-nonfeature-post')->with([
            'popularArticle' => Article::orderBy('views', 'DESC')->paginate(6),
        ]);
    }
}
