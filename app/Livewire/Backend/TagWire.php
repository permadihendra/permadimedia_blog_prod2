<?php

namespace App\Livewire\Backend;

use Illuminate\Support\Str;

use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Models\Tag;

class TagWire extends Component
{

    public $tagsId;
    public $name = "";

    public function store()
    {
        $data = $this->validate([
            'name' => 'required|min:3',
        ]);

        $data['name'] = Str::lower($this->name);

        Tag::create($data);

        session()->flash('success', 'Tags is created sucessfully.');

        return $this->redirect('tags', navigate: true);
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.tag-wire');
    }
}
