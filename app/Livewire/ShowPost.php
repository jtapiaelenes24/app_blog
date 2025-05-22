<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class ShowPost extends Component
{

    public $prueba = 'Mi proyecto con livewire';

    public function render()
    {

        $posts = Post::all();

        return view('livewire.show-post', compact('posts'));
    }
}
