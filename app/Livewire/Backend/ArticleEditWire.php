<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

use App\Livewire\Forms\ArticleForm;

use App\Models\Article;
use App\Models\Category;

class ArticleEditWire extends Component
{
    use WithFileUploads;

    public ArticleForm $form;

    public Article $article;

    public $categories;

    public function boot(){
        $this->categories = Category::orderBy('name')->get();
    }

    public function mount(Article $article){
        // Model binding with Article, this get the url parameter {article} to $article -> must same
        
        $this->form->setArticle($article);
    }

    public function update(){

        $this->form->update(); //call update function in form

        session()->flash('success', 'Article is edited successfully.');

        return $this->redirect('/articles', navigate: true);
    }

    public function cancel(){
        return $this->redirect('/articles', navigate: true);
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.article-edit-wire');
    }
}
