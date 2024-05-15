<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

use App\Models\Category;

class BlogCategories extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog-categories')->with([
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
}
