@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2 bg-darkerprimary border rounded-xl border-darkerprimary">
        <form wire:submit="{{ $submit }}">
            <div class="px-4 py-5 sm:p-6 shadow-sm rounded-md">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3  text-right sm:px-6 shadow-sm rounded-b-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>

