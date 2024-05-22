<?php

namespace App\Livewire\Backend;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

use App\Models\BlogConfig;

class BlogConfigWire extends Component
{

    #[Locked]
    public $configId = '';

    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|min:3')]
    public $value;

    public function edit(BlogConfig $config)
    {
        $this->configId = $config->id;
        $this->name = $config->name;
        $this->value = $config->value;
    }

    public function update(BlogConfig $config)
    {
        $this->validate();

        $config->update($this->only('value'));

        session()->flash('success', 'Config is updated successfully.');

        return $this->redirect('/blog-config', navigate: true);
    }

    public function cancel()
    {
    }

    #[Layout('components.layouts.template')]
    public function render()
    {
        return view('livewire.backend.blog-config-wire')->with([
            'configs' => BlogConfig::get(),
        ]);
    }
}
