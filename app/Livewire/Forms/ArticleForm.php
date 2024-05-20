<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Storage;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Str;
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
    public $img;
    // public $img = '';

    public $img_saved = ''; //save the old image values, for deleting

    public $img_update = '';

    #[Validate]
    public $publish_date = '';

    #[Validate]
    public $category_id = '';


    public $articles;

    public function rules()
    {
        $rules = [
            'title' => 'required|min:3',
            'category_id' => 'required',
            'desc' => 'required|min:20',
            'img' => 'nullable|file|image|mimes:png,jpg,jpeg|max:2024',
            // 'img' => 'nullable|sometimes|max:2048',
            'publish_date' => 'required',
        ];

        return $rules;

        // return [
        //     'title' => 'required|min:3',
        //     'category_id' =>'required',
        //     'desc' => 'required|min:20',
        //     // 'img' => 'nullable|image|mimes:png,jpg,jpeg|max:2024',
        //     'img' => 'nullable|sometimes|mimes:jpeg,png,jpg,svg|max:2048',
        //     'publish_date' => 'required',
        // ];
    }

    public function setArticle(Article $article)
    {
        // if ($article) {
        $this->article = $article;
        $this->title = $article->title;
        $this->desc = $article->desc;
        // $this->img = $article->img;  //keep the $hits->img unassign
        $this->img_saved = $article->img; // save the image values for temporary assign (for delete, or display image)
        $this->publish_date = $article->publish_date;
        $this->category_id = $article->category_id;
        // }
        // else return abort(404);
    }

    public function store()
    {


        $validated = $this->validate();

        $file = $this->img; // img
        $filename = uniqid() . '.' . $this->img->extension(); //12763dshd.jpg
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

    public function update()
    {

        // dump($this->all());

        $validated = $this->validate(); //valudate using form validation

        // dump($validated);

        if ($this->img) //check if $this->image is not String, then 
        {
            $filename = uniqid() . '.' . $this->img->extension(); //12763dshd.jpg
            $file_path = $this->img->storeAs('backend/images', $filename, 'public'); // store file in "backend/images" folder public and get the full path

            // Append Default values
            $validated['img'] = $file_path; // if there is new upload file

            // Add function if the file exist
            if (Storage::exists('public/' . $this->img_saved)) {
                Storage::delete('public/' . $this->img_saved); // delete saved image before
            }
        } else {
            $validated['img'] = $this->img_saved; // if there is not new upload file
        }




        $validated['slug'] =  Str::slug($this->title);

        // dump($validated);

        $this->article->update(
            $validated
        );
    }

    public function changeStatus(Article $article)
    {
        // dump($article);
        if ($article->status == 0) {
            $status_update = 1;
        } else {
            $status_update = 0;
        }
        $article->update(['status' => $status_update,]);
    }

    public function delete(Article $article)
    {

        // Add function if the file exist then delete
        if (Storage::exists('public/' . $article->img)) {
            Storage::delete('public/' . $article->img); // delete saved image before
        }
        $article->delete();
    }
}
