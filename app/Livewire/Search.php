<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Isolate;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

/*
 * Livewire bundles requests to limit the number of requests sent to the server. Sometimes you wan to isolate a component's request.
 * Search is a good example where you want the action to be independent of any other update.
 * Lazy loaded components are isolated by default and run in parallel with the bundled update.
 * If you have a page lots of lazy loaded components, you'll want bundle them . To do this, #[Lazy(isolate: false)]
*/
#[Isolate]  
class Search extends Component
{
    // #[Validate('required')]
    #[Url(as: 'q', except: '', history: true)] // as masks searchText with q. except ensures searchText not in url if search box is empty. history true pushes instead of replacing.
    public $searchText = '';
    // public $results = [];
    public $placeholder;

    // public function updatedSearchText(string $value)
    // {
    //     $this->reset('results');
    //     $searchTerm = "%{$value}%";

    //     $this->validate();

    //     $this->results = Article::where('title', 'LIKE', $searchTerm)->get();
    // }

    #[On('search:clear-results')]
    public function clear()
    {
        $this->reset('searchText');
    }

    // To have the ability to dynamically control url behaviour
    protected function queryString() {
        return [
            'searchText' => [
                'as' => 'q',
                'history' => true,
                'except' => '',
            ]
        ];
    }

    public function render()
    {
        return view('livewire.search', [
            'results' =>  Article::where('title', 'LIKE', "%{$this->searchText}%")->get()
        ]);
    }
}
