<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Storage;

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

    public $img_saved = ''; //save the old image values, for deleting

    public $img_update = '';

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
            // 'img' => 'nullable|image|mimes:png,jpg,jpeg|max:2024',
            'img' => 'nullable|sometimes|mimes:jpeg,png,jpg,svg|max:2048',
            'publish_date' => 'required',
        ];
    }

    public function setArticle(Article $article){
        // if ($article) {
            $this->article = $article;
            $this->title = $article->title;
            $this->desc = $article->desc;
            $this->img = $article->img;
            $this->img_saved = $article->img; // save the image values for deleting
            $this->publish_date = $article->publish_date;
            $this->category_id = $article->category_id;
        // }
        // else return abort(404);
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

        $this->validate(); //valudate using form validation

        if(is_file($this->img)) //check if $this->image is not String, then 
        {
            $filename = uniqid().'.'.$this->img->extension(); //12763dshd.jpg
            $file_path = $this->img->storeAs('backend/images', $filename, 'public'); // store file in "backend/images" folder public and get the full path
          
            // dump($this->img_saved);
            Storage::delete('public/'.$this->img_saved); // delete saved image before

            // Append Default values
            $this->img = $file_path;
        } else {
            $this->img = $this->img_saved;
        }

        $this->article->update(
            $this->all()
        );
    }
}
