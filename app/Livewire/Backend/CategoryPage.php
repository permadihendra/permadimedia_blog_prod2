<?php

namespace App\Livewire\Backend;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Layout;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryPage extends Component
{
    public $categories;

    public $categoryId;
    public $name;

    public function boot(){
        $this->categories = Category::latest()->get();
    }

    public function store(){
        $data = $this->validate([
            'name' => 'required|min:3'
        ]);

        $data['slug'] = Str::slug($this->name);

        Category::create($data);

        session()->flash('success', 'Category is created sucessfully.');

        return $this->redirect('categories', navigate: true);
    }

    public function edit($id){
        $category = Category::find($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
    }

    public function update($id){
        $category = Category::find($id);
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->save();

        session()->flash('successUpdate', 'Category is updated sucessfully.');

        return $this->redirect('categories', navigate: true);
    }

    public function delete($id){
        Category::destroy($id);

        session()->flash('successDelete', 'Category is deleted sucessfully.');
        return $this->redirect('categories', navigate: true);
    }

    public function cancel(){
        return $this->redirect('categories', navigate: true);
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.category');
    }
}
