<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class ShowPost extends Component
{
    use WithPagination;

    public $search = '';
    protected $queryString = ['search']; // Para mantener el estado en la URL

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
