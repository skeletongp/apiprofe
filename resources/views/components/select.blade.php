@props(['label', 'icon', 'hint','validate'])
@php
    $selectId = '';
    if (isset($attributes['id'])) {
        $selectId = $attributes['id'];
    } else {
        $selectId = Str::random(10);
    }
@endphp
<div class="flex flex-col w-full">
    @isset($label)
        <label class="font-semibold ml-1" for="{{ $selectId }}">{{ $label }}</label>
    @endisset
    <div class="bg-white px-2 py-1 rounded-lg flex items-center border w-full focus-within:border-cyan-300">
        @isset($icon)
            <span class="{{ $icon }} mr-1 ri-lg"></span>
        @endisset
        <select {{ $attributes->merge(['class' => 'bg-transparent focus:outline-none w-full px-2 py-1 ']) }}
            id="{{ $selectId }}">
            @isset($hint)
                <option value="" selected disabled hidden>{{ $hint }}</option>
            @endisset
            {{ $slot }}
        </select>
    </div>
    @isset($validate)
        <x-input-error for="{{$validate}}"></x-input-error>        
    @endisset
   
</div>
<script type="module">
    $('.select2').each(function(){
        $(this).append('<option value="" selected disabled hidden></option>');
    })
    $('.select2').select2();
</script>
