<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Models\Article;
use App\Models\Category;

class Dashboard extends Component
{

    public $total_articles, $total_categories, $latest_articles;

    public function boot(){
        $this->total_articles = Article::count();
        $this->total_categories = Category::count();
        $this->latest_articles = Article::orderBy('updated_at')->take(10)->get();
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.dashboard');
    }
}
