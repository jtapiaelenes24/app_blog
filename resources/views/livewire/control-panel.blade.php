<div>
    <section class="max-w-7xl mx-auto p-6 lg:p-8">
        <h2 class="text-center text-3xl">Panel de Administración</h2>

        @livewire('create-post')

        <div class="grid grid-cols-1 gap-6 lg:gap-8">
            @foreach ($posts as $post)
                <article class="bg-gray-200 m-10 p-4 rounded-lg shadow-sm">
                    <h2 class="text-2xl text-gray-950">
                        {{ $post->id }}._
                        <span class="ml-1 text-2xl text-gray-950 my-2">{{ $post->titulo }}</span>
                    </h2>

                    <div class="mt-3 space-x-2">
                        <a href="#" title="Ver post"
                            class="text-center text-gray-500 rounded-3xl hover:no-underline hover:text-gray-700 transition duration-150 hover:ease-in">
                            <i class="fa fa-eye"></i>
                        </a>

                        <button title="Editar post"
                            class="text-center text-gray-500 rounded-3xl hover:no-underline hover:text-gray-700 transition duration-150 hover:ease-in">
                            <i class="fa fa-pencil-square-o"></i>
                        </button>

                        <a href="#" title="Borrar post"
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
    </section>
</div>
