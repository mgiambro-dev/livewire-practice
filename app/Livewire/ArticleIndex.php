<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Title;

#[Title('Articles')]
class ArticleIndex extends Component
{
    // public $articles = [];

    // public function mount()
    // {
    //     $this->articles = Article::all();
    // } 


    public function render()
    {
        return view('livewire.article-index', [
            'articles' => Article::all(),       // Passing in articles here means that when they are updated in the db, the changes are reflected in the frontend.                                               
        ]);
    }
}
