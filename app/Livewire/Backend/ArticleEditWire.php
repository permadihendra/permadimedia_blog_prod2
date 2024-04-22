<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Livewire\Forms\ArticleForm;

use App\Models\Article;
use App\Models\Category;

class ArticleEditWire extends Component
{

    public ArticleForm $form;

    public Article $article;

    public $categories;

    public function boot(){
        $this->categories = Category::orderBy('name')->get();
    }

    public function mount($id){
        $article = Article::find($id);
        $this->form->setArticle($article);
    }

    public function update(){
        $this->form->update();
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
