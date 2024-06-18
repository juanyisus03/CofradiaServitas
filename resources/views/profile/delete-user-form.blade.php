<x-action-section>
    <x-slot name="title">
        <h2 class="text-lg font-medium text-texto">{{ __('Eliminar Cuenta') }}</h2>
    </x-slot>

    <x-slot name="description">
        <p class="mt-1 text-sm text-accent">{{ __('Eliminar permanentemente tu cuenta.') }}</p>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-texto">
            {{ __('Una vez que se elimine tu cuenta, todos sus recursos y datos se eliminarán de forma permanente. Antes de eliminar tu cuenta, por favor descarga cualquier dato o información que desees conservar.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled" class="bg-background text-texto hover:bg-background-dark">
                {{ __('Eliminar Cuenta') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                <h2 class="text-lg font-medium text-texto">{{ __('Eliminar Cuenta') }}</h2>
            </x-slot>

            <x-slot name="content">
                <p class="text-sm text-texto">
                    {{ __('¿Estás seguro de que quieres eliminar tu cuenta? Una vez que se elimine tu cuenta, todos sus recursos y datos se eliminarán de forma permanente. Por favor, ingresa tu contraseña para confirmar que deseas eliminar tu cuenta de forma permanente.') }}
                </p>

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4 border-primary text-texto"
                                autocomplete="current-password"
                                placeholder="{{ __('Contraseña') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2 text-texto" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Eliminar Cuenta') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
        </div>
    </x-slot>
</x-action-section>
