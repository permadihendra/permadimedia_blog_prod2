<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Str;
use Livewire\WithFileUploads;

use App\Models\Category;
use App\Models\Article;

class ArticleForm extends Form
{
    use WithFileUploads;

    // Form Variables

    public ?Article $article;

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
    
    public function rules(){
        return [
            'title' => 'required|min:3',
            'category_id' =>'required',
            'desc' => 'required|min:20',
            'img' => 'required|image|mimes:png,jpg,jpeg|max:2024',
            'publish_date' => 'required',
        ];
    }

    public function setArticle(Article $article){
        $this->article = $article;
        $this->title = $article->title;
        $this->desc = $article->desc;
        $this->img = $article->img;
        $this->publish_date = $article->publish_date;
        $this->category_id = $article->category_id;
     }

    public function store() {


        $validated = $this->validate();

        $file= $this->img; // img
        $filename = uniqid().'.'.$this->img->extension(); //12763dshd.jpg
        $file_path = $this->img->storeAs('backend/images', $filename, 'public'); // store file in "backend/images" folder public and get the full path
        
        // Append Default values
        $validated['img'] = $file_path;
        $validated['slug'] =  Str::slug($this->title);
        $validated['views'] = 0;
        $validated['status'] = 0;


        Article::create($validated);

        session()->flash('success', 'Article is created successfully.');

        return $this->redirect('/articles', navigate: true);
        
    }

    public function update(){
        $this->article->update(
            $this->all()
        );
    }
}
