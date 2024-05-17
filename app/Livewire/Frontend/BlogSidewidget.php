<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\Article;

class BlogSidewidget extends Component
{

    public function render()
    {
        return view('livewire.frontend.blog-sidewidget')->with([
            'popular_articles' => Article::where('status', 1)->orderBy('views', 'DESC')->take(3)->get(),
        ]);
    }
}
