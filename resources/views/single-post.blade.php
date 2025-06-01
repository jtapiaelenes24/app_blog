<x-app-layout>
    <x-slot name="header">
        @livewire('navigation-menu')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 shadow-xl" sm:rounded-lg>
                <div class="mb-8">
                    <h3 class="text-xl text-stone-900 mb-1">Títuo del Artículo</h3>
                    <span class="text-gray-500">{{ $postid->titulo }}</span>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl text-stone-900 mb-1">Fecha del Artículo</h3>
                    <span class="text-gray-500">{{ $postid->fecha->format('d-m-Y') }}</span>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl text-stone-900 mb-1">Extracto del Artículo</h3>
                    <span class="text-gray-500">{{ $postid->extracto }}</span>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl text-stone-900 mb-1">Descripción del Artículo</h3>
                    <span class="text-gray-500">{{ $postid->descripcion }}</span>
                </div>

                <div class="mb-8">
                    <img src="{{ Storage::url($postid->imagen) }}" alt="" class="block mx-auto">
                </div>

                <a href="{{ route('controlpanel') }}" class="text-lg text-blue-500 hover:underline">Volver al Panel</a>

            </div>
        </div>
    </div>
</x-app-layout>
