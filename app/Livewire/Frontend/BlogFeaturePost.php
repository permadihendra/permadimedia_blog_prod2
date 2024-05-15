<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

use App\Models\Article;

class BlogFeaturePost extends Component
{

    public function render()
    {
        return view('livewire.frontend.blog-feature-post')->with([
            'latestArticle' => Article::latest()->first(),
        ]);
    }
}
