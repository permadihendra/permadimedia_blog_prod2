<?php

namespace App\Livewire\Template;

use Livewire\Attributes\Locked;
use Livewire\Component;

class AppVersion extends Component
{

    #[Locked]
    public $laravel;

    #[Locked]
    public $bootstrap;

    public function boot()
    {
        $this->laravel = app()->version();
        $packageJsonPath = base_path('package.json');
        $packageJson = json_decode(file_get_contents($packageJsonPath), true);
        $this->bootstrap = $packageJson['dependencies']['bootstrap'] ?? 'Not installed';
    }

    public function render()
    {
        return view('livewire.template.app-version')->with([
            'laravel' => $this->laravel,
            'bootstrap' => $this->bootstrap,
        ]);
    }
}
