<x-form-section submit="updateProfileInformation">
    <x-slot name="title" class="text-texto">{{ __('Información del Perfil') }}</x-slot>

    <x-slot name="description" class="text-accent">{{ __('Actualiza la información de tu perfil y dirección de correo electrónico.') }}</x-slot>

    <x-slot name="form">

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nombre') }}" class="text-texto" />
            <x-input id="name" type="text" class="mt-1 block w-full border-primary text-texto" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2 text-red-500" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Correo Electrónico') }}" class="text-texto" />
            <x-input id="email" type="email" class="mt-1 block w-full border-primary text-texto" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2 text-red-500" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3 text-green-600" on="saved">
            {{ __('Guardado.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-button>
    </x-slot>
</x-form-section>
