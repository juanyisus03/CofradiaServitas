@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-texto']) }}>{{ $message }}</p>
@enderror
