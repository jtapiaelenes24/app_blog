<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreatePost extends Component
{

    use WithFileUploads;

    public $open = false;

    public $titulo, $extracto, $descripcion, $slug, $imagen;

    protected $rules = [
        'titulo' => 'required',
        'extracto' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:2048'
    ];

    protected $messages = [
        'titulo' => 'Debe de ingresar un título al post',
        'extracto' => 'Debe de ingresar un extracto al post',
        'descripcion' => 'Debe de ingresar una descripción al post',
        'imagen' => 'Debe de seleccionar una imagen'
    ];

    public function AutoSlug()
    {
        $this->slug = Str::slug($this->titulo);
    }

    public function save()
    {

        $this->validate();

        $imagenPath = $this->imagen->store('img');

        Post::create([
            'titulo' => $this->titulo,
            'slug' => $this->slug,
            'extracto' => $this->extracto,
            'descripcion' => $this->descripcion,
            'imagen' => $imagenPath,
            'fecha' => now()
        ]);

        $this->dispatch('post-created');
        // Resetear los campos después de guardar
        $this->reset(['open']);
        // $this->emit('alert', 'Post guardado con éxito');
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset(['titulo', 'slug', 'extracto', 'descripcion', 'imagen']);
            $this->resetValidation();
        }
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
