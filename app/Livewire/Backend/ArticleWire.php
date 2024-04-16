<?php

namespace App\Livewire\Backend;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Features\SupportFormObjects\Form;

use App\Models\Article;
use App\Models\Category;

class ArticleWire extends Component
{

    public $articles;

    public $title, $desc, $img, $publish_date, $category_id;

    public $categories;

    public function store(Article $article) {

        // $article = $this->validate([
        //     'title' => 'required|min:3',
        //     'category_id' =>'required',
        //     'desc' => 'required|min:20',
        //     'publish_date' => 'required',
        // ]);

        // Get input data from public properties
        // $article->title = $this->title;
        // $article->category_id = $this->category_id;
        // $article->desc = $this->desc;
        // $article->publish_date = $this->publish_date;
      

        //insert default values
        // $article->slug = Str::slug($this->title);
        // $article->img = "article.jpg";
        // $article->views = 0;
        // $article->status = "draft"; 

        // $article->save();
        session()->flash('success', 'Article is created successfully.');

        return $this->redirect('articles', navigate: true);
       
    }

    public function boot(){
        $this->articles = Article::latest()->get();
         // Load category data
        $this->categories = Category::orderBy('name', 'ASC')->get();
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.article-wire');
    }
}
