<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Models\Category;

class CategoryPage extends Component
{
    public $categories;

    public function boot(){
        $this->categories = Category::get();
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.category');
    }
}
