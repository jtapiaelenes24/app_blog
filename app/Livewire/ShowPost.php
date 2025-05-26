<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class ShowPost extends Component
{
    use WithPagination;

    public $article;
    public $search = '';
    protected $queryString = ['search']; // Para mantener el estado en la URL

    public $open = false;

    public function mount()
    {
        $this->article = new Post;
    }

    public function single(Post $articulo)
    {
        $this->article = $articulo;
        $this->open = true;
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::when($this->search, function ($query) {
            $query->where(function ($q) {
                $q->where('titulo', 'like', '%' . $this->search . '%')
                    ->orWhere('extracto', 'like', '%' . $this->search . '%');
            });
        })
            ->orderBy('fecha', 'desc')
            ->paginate(6);

        return view('livewire.show-post', compact('posts'));
    }
}
