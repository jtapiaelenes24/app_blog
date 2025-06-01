<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class CreatePost extends Component
{

    public $open = false;

    public $titulo, $extracto, $descripcion;

    protected $rules = [
        'titulo' => 'required',
        'extracto' => 'required',
        'descripcion' => 'required'
    ];

    protected $messages = [
        // 'titulo' => 'Debe de ingresar un título al post',
        'extracto' => 'Debe de ingresar un extracto al post',
        'descripcion' => 'Debe de ingresar una descripción al post'
    ];

    // public function update($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function save()
    {

        $this->validate();

        Post::create([
            'titulo' => $this->titulo,
            'extracto' => $this->extracto,
            'descripcion' => $this->descripcion
        ]);

        $this->dispatch('post-created');
        // Resetear los campos después de guardar
        $this->reset(['open']);
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset(['titulo', 'extracto', 'descripcion']);
            $this->resetValidation();
        }
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
