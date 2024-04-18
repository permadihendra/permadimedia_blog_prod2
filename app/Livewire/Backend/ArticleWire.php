<?php

namespace App\Livewire\Backend;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFormObjects\Form;

use App\Models\Article;
use App\Models\Category;

class ArticleWire extends Component
{
   
    public function boot(){
        $this->articles = Article::latest()->get();
         // Load category data
        $this->categories = Category::orderBy('name', 'ASC')->get();
    }

    public function create(){
        return $this->redirect('/articles/create', navigate: true);
    }

    public function delete(Article $article){
        $article->delete();
        session()->flash('success', 'Article is deleted successfully.');

        return $this->redirect('/articles', navigate: true);
    }

    public function cancel(){
        return $this->redirect('/articles', navigate: true);
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.article-wire')->with(['title' => 'Articles - Admin']);
    }
}
