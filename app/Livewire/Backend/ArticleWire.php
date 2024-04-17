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
// Form Variables
    #[Validate]
    public $title = '';

    #[Validate]
    public $desc = '';

    #[Validate]
    public $img = '';

    #[Validate]
    public $publish_date = '';

    #[Validate]
    public $category_id = '';


    public $articles;

    

    public $categories;

    public function rules(){
        return [
            'title' => 'required|min:3',
            'category_id' =>'required',
            'desc' => 'required|min:20',
            'publish_date' => 'required',
        ];
    }

    public function store() {

        $validated = $this->validate();

         // Append Default values
        $validated['slug'] =  Str::slug($this->title);
        $validated['img'] = "article.jpg";
        $validated['views'] = 0;
        $validated['status'] = 0;

        // dump($validated);

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

        Article::create($validated);

        session()->flash('success', 'Article is created successfully.');

        return $this->redirect('articles', navigate: true);
       
    }

    public function boot(){
        $this->articles = Article::latest()->get();
         // Load category data
        $this->categories = Category::orderBy('name', 'ASC')->get();
    }

    public function delete(Article $article){
        $article->delete();
        session()->flash('success', 'Article is deleted successfully.');
        
        return $this->redirect('articles', navigate: true);
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.article-wire')->with(['title' => 'Articles - Admin']);
    }
}
