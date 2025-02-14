<?php

namespace App\Livewire;

use App\Models\Article;
use Exception;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Session;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Manage Articles')]
class ArticleList extends AdminComponent
{
    use WithPagination;

    #[Session(key: 'published')]
    public $showOnlyPublished = false;

    #[Computed()]                   // Caches results, lasts for single request. persist: true parameter persists throughout all requests.
    public function articles() {
       $query = Article::query();

        if ($this->showOnlyPublished) {
            $query->where('published', 1);
        }

        return $query->paginate(10, pageName: 'articles-page');  // pageName only necessary when multiple paginators to correctly update page number in url
    }

    public function delete(Article $article) 
    {
        if($this->articles->count() < 10) {
            throw new Exception('nope');
        }

        $article->delete();
        unset($this->articles); // Breaks the cache so that the view reflects updated data, not cached data.
        cache()->forget('published-count');
    } 

    public function togglePublished($showOnlyPublished) {
        $this->showOnlyPublished = $showOnlyPublished;
        $this->resetPage(pageName: 'articles-page');
    }

    // If the name of the view follows Livewire's convention, it will automatically render that view, so don't need the render method.
    // public function render()
    // {
    //     return view('livewire.article-list');
    // }
}
