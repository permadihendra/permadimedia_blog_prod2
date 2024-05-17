<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

use App\Models\Category;

class BlogCategories extends Component
{

    public $category;

    public function filterByCategory($slug)
    {
        // dump($slug);
        $this->dispatch('get-article-by-category', slug: $slug)->to(BlogAllArticles::class);
    }

    public function render()
    {
        return view('livewire.frontend.blog-categories')->with([
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
}
