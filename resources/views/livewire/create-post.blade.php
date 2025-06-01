<div>
    <x-secondary-button class="ml-10" wire:click="set('open', true)">
        Nuevo Post
    </x-secondary-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <span>Grabar Post</span>
            {{-- <input type="text" readonly class="border-none focus:ring-transparent"> --}}
        </x-slot>

        <x-slot name="content">
            <x-label value="Título" class="text-lg mb-2 cursor-pointer" for="titulo" />
            <input wire:model.defer="titulo" type="text" class="w-full p-2 mb-2 border" id="titulo">
            <x-input-error for="titulo" class="mb-2" />

            <x-label value="Slug" class="text-lg mb-2 cursor-pointer" />
            <input type="text" class="w-full p-2 mb-2 border" readonly>

            <x-label value="Extracto" class="text-lg mb-2 cursor-pointer" for="extracto" />
            <input wire:model.defer="extracto" type="text" class="w-full p-2 mb-2 border" id="extracto">
            <x-input-error for="extracto" class="mb-2" />

            <x-label value="Descripción" class="text-lg mb-2 cursor-pointer" for="descripcion" />
            <textarea wire:model.defer="descripcion" name="descripcion" id="descripcion" class="w-full max-h-48 h-48 p-2 mb-2"></textarea>
            <x-input-error for="descripcion" class="mb-2" />

            <input wire:model="imagen" type="file" name="imagen" class="mb-2" id="">
            <x-input-error for="imagen" class="mb-2" />

            @if ($imagen)
                <img src="{{ $imagen->temporaryUrl() }}" alt="">
            @endif

            <div class="text-center">
                <div wire:loading wire:target="imagen" class="text-lg text-blue-500">
                    Cargando imagen, un momento por favor
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-danger-button class="mr-3" wire:click="set('open', false)">
                Cancelar
            </x-danger-button>

            <x-button class="mr-2 disable:opacity-25" wire:click="save" wire:loading.attr="disable"
                wire:target="imagen">
                Grabar
            </x-button>

            <span wire:loading wire:target="save">Guardando...</span>
        </x-slot>
    </x-dialog-modal>
</div>
