@props(['label', 'icon','validate'])
@php
    $inputId = '';
    if (isset($attributes['id'])) {
        $inputId = $attributes['id'];
    } else {
        $inputId = Str::random(10);
    }
@endphp
<div class="flex flex-col w-full">
    @isset($label)
        <label class="font-semibold ml-1" for="{{ $inputId }}">{{ $label }}</label>
    @endisset
    <div class="bg-white px-2 py-1 transition-all duration-300 ease-linear rounded-lg flex items-center border w-full focus-within:border-transparent focus-within:ring-2 ring-inset ">
        @isset($icon)
            <span class="{{ $icon }} mr-1 ri-lg"></span>
        @endisset
        <input id="{{ $inputId }}" 
            {{ $attributes->merge(['class' => 'bg-transparent focus:outline-none  w-full px-2 py-1']) }}>
            {{ $slot }}
    </div>
    @isset($validate)
        <x-input-error for="{{$validate}}"></x-input-error>        
    @endisset
</div>
