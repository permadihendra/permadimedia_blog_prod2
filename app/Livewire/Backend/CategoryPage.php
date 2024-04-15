<?php

namespace App\Livewire\Backend;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Layout;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryPage extends Component
{
    public $categories;

    public $name;

    public function boot(){
        $this->categories = Category::get();
    }

    public function store(){
        $data = $this->validate([
            'name' => 'required|min:3'
        ]);

        $data['slug'] = Str::slug($this->name);

        Category::create($data);

        return $this->redirect('categories', navigate: true);
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.category');
    }
}
