@props(['listName', 'inputId', 'label' => '', 'model' => null])
@php
    $inputId = '';
    if (isset($attributes['id'])) {
        $inputId = $attributes['id'];
    } else {
        $inputId = Str::random(10);
    }
@endphp
<div class="h-full w-full relative" style="max-height:2.1em; overflow:hidden">
    @if ($label)
        <label for="{{ $inputId }}"
            class="block text-base  font-medium text-gray-900 dark:text-gray-300">{{ $label }}</label>
    @endif
    <x-input label="" type="text" id="{{ $inputId }}" list="{{ $listName }}"  onfocus="this.value=''"
        {{ $attributes }} />
    <datalist id="{{ $listName }}" >
        {{ $slot }}
    </datalist>
    <span id="error" class="text-danger"></span>
    
</div>
