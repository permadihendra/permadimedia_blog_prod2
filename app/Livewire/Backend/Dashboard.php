<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Models\Article;
use App\Models\Category;

class Dashboard extends Component
{

    public $total_articles, $total_categories, $latest_articles, $popular_articles;

    public function boot(){
        $this->total_articles = Article::count();
        $this->total_categories = Category::count();
        $this->latest_articles = Article::orderBy('updated_at', 'DESC')->take(5)->get();
        $this->popular_articles = Article::where('status', 1)->orderBy('views', 'DESC')->take(5)->get();
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.dashboard');
    }
}
