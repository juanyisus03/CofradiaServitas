@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-lighterprimary  text-texto  border-accent focus:border-primary rounded-md shadow-sm']) !!}>
