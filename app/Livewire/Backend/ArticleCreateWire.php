<?php

namespace App\Livewire\Backend;

use App\Livewire\Forms\ArticleForm as FormsArticleForm;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

use App\Models\Category;
use App\Livewire\Forms\ArticleForm;

class ArticleCreateWire extends Component
{
    use WithFileUploads;

    public ArticleForm $form;

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

    public function boot()
    {
    }

    // public function rules()
    // {
    //     return [
    //         'title' => 'required|min:3',
    //         'category_id' => 'required',
    //         'desc' => 'required|min:20',
    //         'img' => 'required|image|mimes:png,jpg,jpeg|max:2024',
    //         'publish_date' => 'required',
    //     ];
    // }

    public function store()
    {


        // $validated = $this->validate();

        // $file= $this->img; // img
        // $filename = uniqid().'.'.$this->img->extension(); //12763dshd.jpg
        // $file_path = $this->img->storeAs('backend/images', $filename, 'public'); // store file in "backend/images" folder public and get the full path

        // // Append Default values
        // $validated['img'] = $file_path;
        // $validated['slug'] =  Str::slug($this->title);
        // $validated['views'] = 0;
        // $validated['status'] = 0;


        // Article::create($validated);

        $this->form->store();

        session()->flash('success', 'Article is created successfully.');

        return $this->redirect('/articles', navigate: true);
    }

    public function cancel()
    {
        return $this->redirect('/articles', navigate: true);
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.article-create-wire', [
            'categories' => Category::orderBy('name', 'ASC')->get(),
        ]);
    }
}
