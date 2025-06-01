<div>
    <section class="max-w-7xl mx-auto p-6 lg:p-8">
        <h2 class="text-center text-3xl">Panel de Administración</h2>

        <div class="mt-16">
            <div class="flex ml-10 items-center">
                <span class="mr-3">Mostrar</span>
                <select wire:model.live="cant"
                    class="h-10 border-gray-400 hover:border-gray-500 leading-tight focus:outline-none focus:shadow-outline rounded">
                    <option value="">Elegir</option>
                    <option value="3">3</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                </select>

                @livewire('create-post')

            </div>

            <div class="grid grid-cols-1 gap-6 lg:gap-8">
                @foreach ($posts as $post)
                    <article class="bg-gray-200 m-10 p-4 rounded-lg shadow-sm">
                        <h2 class="text-2xl text-gray-950">
                            {{ $post->id }}._
                            <span class="ml-1 text-2xl text-gray-950 my-2">{{ $post->titulo }}</span>
                        </h2>

                        <div class="mt-3 space-x-2">
                            <a href="{{ route('single-post', $post) }}" title="Ver post"
                                class="text-center text-gray-500 rounded-3xl hover:no-underline hover:text-gray-700 transition duration-150 hover:ease-in">
                                <i class="fa fa-eye"></i>
                            </a>

                            <button wire:click="edit({{ $post }})" title="Editar post"
                                class="text-center text-gray-500 rounded-3xl hover:no-underline hover:text-gray-700 transition duration-150 hover:ease-in">
                                <i class="fa fa-pencil-square-o"></i>
                            </button>

                            <a wire:click="delete({{ $post->id }})" title="Borrar post"
                                class="text-center text-gray-500 rounded-3xl hover:no-underline hover:cursor-pointer hover:text-gray-700 transition duration-150 hover:ease-in">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            @if ($posts->hasPages())
                <div class="py-3">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </section>

    {{-- MODAL PARA EDITAR POSTS --}}

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <x-validation-errors />
            <span>Actualizar Post</span>
        </x-slot>

        <x-slot name="content">
            <x-label value="Título" class="text-lg mb-2 cursor-pointer" for="titulo" />
            <input wire:model="article.titulo" wire:keyup="AutoSlug" type="text" class="w-full p-2 mb-2 border"
                id="titulo">
            <x-input-error for="article.titulo" class="mb-2" />

            <x-label value="Slug" class="text-lg mb-2 cursor-pointer" />
            <input wire:model="article.slug" type="text" class="w-full p-2 mb-2 border" readonly>
            <x-input-error for="article.slug" class="mb-2" />

            <x-label value="Extracto" class="text-lg mb-2 cursor-pointer" for="extracto" />
            <input wire:model="article.extracto" type="text" class="w-full p-2 mb-2 border" id="extracto">
            <x-input-error for="article.extracto" class="mb-2" />

            <x-label value="Descripción" class="text-lg mb-2 cursor-pointer" for="descripcion" />
            <textarea wire:model="article.descripcion" name="descripcion" id="descripcion" class="w-full max-h-48 h-48 p-2 mb-2"></textarea>
            <x-input-error for="article.descripcion" class="mb-2" />

            <input wire:model="imagen" type="file" name="imagen" class="mb-2" id="">
            <x-input-error for="imagen" class="mb-2" />

            @if ($imagen)
                <img src="{{ $imagen->temporaryUrl() }}" alt="" class="mt-2 h-32">
            @elseif(isset($article['imagen']))
                <img src="{{ Storage::url($article['imagen']) }}" alt="" class="mt-2 h-32">
            @endif

            <div class="text-center">
                <div wire:loading wire:target="imagen" class="text-lg text-blue-500">
                    Cargando imagen, un momento por favor
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-danger-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-danger-button>

            <x-button wire:click="update" wire:loading.attr="disabled" wire:target="update,imagen">
                Actualizar
            </x-button>

            <span wire:loading wire:target="update" class="ml-2">Actualizando...</span>
        </x-slot>
    </x-dialog-modal>

    @push('js')
        <script>
            window.addEventListener('deleteConfirmation', event => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('deletePost')
                    }
                })
            })
            window.addEventListener('postDeleted', event => {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            })
        </script>
    @endpush

</div>
