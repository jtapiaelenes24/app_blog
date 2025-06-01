<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ControlPanel extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $cant = 6;

    public $delete_id;

    public $open = false;
    public $article = [];

    public $imagen;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['post-created' => '$refresh', 'deletePost'];

    protected $rules = [
        'article.titulo' => 'required',
        'article.slug' => 'required',
        'article.extracto' => 'required',
        'article.descripcion' => 'required'
    ];

    protected $messages = [
        'article.titulo.required' => 'Debe ingresar un título al post',
        'article.extracto.required' => 'Debe ingresar un extracto al post',
        'article.descripcion.required' => 'Debe ingresar una descripción al post'
    ];

    public function AutoSlug()
    {
        $this->article['slug'] = Str::slug($this->article['titulo']);
    }

    public function edit(Post $post)
    {
        $this->reset(['open', 'imagen']);
        $this->article = $post->toArray(); // Convertimos a array
        $this->open = true;
        $this->resetValidation();
    }

    public function update()
    {
        $this->validate();

        $post = Post::findOrFail($this->article['id']);

        if ($this->imagen) {
            Storage::delete($post->imagen);
            $post->imagen = $this->imagen->store('img');
        }

        $post->update([
            'titulo' => $this->article['titulo'],
            'slug' => $this->article['slug'],
            'extracto' => $this->article['extracto'],
            'descripcion' => $this->article['descripcion']
        ]);

        $this->reset(['open', 'imagen', 'article']);
        $this->dispatch('post-created');
        // $this->emit('alert', 'Post actualizado con éxito');
    }

    public function delete($id)
    {
        $this->delete_id = $id;
        $this->dispatch('deleteConfirmation');
    }

    public function deletePost()
    {
        $post = Post::where('id', $this->delete_id);
        $post->delete();

        $this->dispatch('postDeleted');
    }

    public function render()
    {
        $posts = Post::orderBy($this->sort, $this->direction)->paginate($this->cant);
        return view('livewire.control-panel', compact('posts'));
    }
}
