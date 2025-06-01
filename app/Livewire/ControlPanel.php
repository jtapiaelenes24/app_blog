<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class ControlPanel extends Component
{

    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['post-created' => '$refresh'];

    use WithPagination;

    public function render()
    {

        // $posts = Post::all();
        $posts = Post::orderBy($this->sort, $this->direction)->paginate(5);

        return view('livewire.control-panel', compact('posts'));
    }
}
