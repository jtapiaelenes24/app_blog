<?php

namespace App\Livewire;

use Livewire\Component;

class ShowPost extends Component
{

    public $prueba = 'Mi proyecto con livewire';

    public function render()
    {
        return view('livewire.show-post');
    }
}
