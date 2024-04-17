<?php

namespace App\Livewire\Datatables;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Article;

class ArticleTableWire extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.datatables.article-table-wire', [
            'articles' => Article::paginate(25)
            ,
        ]);
    }
}
