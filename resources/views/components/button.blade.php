<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-texto uppercase tracking-widest  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
