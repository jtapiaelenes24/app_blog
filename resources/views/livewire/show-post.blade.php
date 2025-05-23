<div class="mt-16">
    {{-- Stop trying to control. --}}

    <div class="overflow-hidden">
        {{-- <x-input wire:model="search" class="md:float-right py-1 px-2 w-80 text-stone-700" placeholder="Buscar post..." /> --}}
        <x-input wire:model.live.debounce.500ms="search" class="md:float-right py-1 px-2 w-80 text-stone-700"
            placeholder="Buscar post..." />
    </div>

    @if (count($posts))
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

            @foreach ($posts as $post)
                <article class="bg-gray-200 m-10 p-4">
                    <div>
                        {{-- <img src="{{ Storage::url($post->imagen) }}" alt="Imagen del post"> --}}
                        <img src="{{ Storage::url($post->imagen) }}" alt="Imagen del post">
                    </div>

                    <div>
                        <h2 class="text-center text-2xl text-gray-500 my-2">
                            {{ $post->titulo }}
                        </h2>
                        {{-- <p class="text-left ,y-2 text-gray-500">{{ $post->fecha->toFormattedDateString() }}</p> --}}
                        <p class="text-left ,y-2 text-gray-500">{{ $post->fecha->format('d-m-Y') }}</p>
                        <p class="text-left ,y-2 text-gray-500">
                            {{ $post->extracto }}
                        </p>
                        <button
                            class="mx-auto text-center text-gray-700 rounded-3xl p-1 block bg-gray-400 w-32 hover:bg-gray-500 hover:underline hover:text-gray-900 transition duration-150 hover:ease-in ">
                            Saber más
                        </button>
                    </div>
                </article>
            @endforeach

        </div>
    @else
        <div class="text-center text-xl text-red-500">No existe ningún registro</div>
    @endif


    {{-- PAGINACIÓN --}}
    @if ($posts->hasPages())
        <div class="p-2 bg-stone-200">
            {{ $posts->links() }}
        </div>
    @endif

</div>
