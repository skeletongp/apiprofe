@props(['icon' => 'ri-home-line', 'text' => 'HOME', 'route' => '#'])
<a href="{{ $route }}">
    <div class="flex w-max flex-col justify-center space-y-0 items-center">
        <span class="{{ $icon }} text-[1.7rem] leading-5 "></span>
        {{-- <span class="text-sm font-semibold ">{{ $text }}</span> --}}
    </div>
</a>
