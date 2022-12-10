{{-- Modal using AlpineJS --}}
<div x-data="{ open: false }" >
    <div>
        {{ $button }}
    </div>

    {{-- Modal Body --}}
    <div class="fixed  flex flex-col items-center justify-center top-0 left-0">
        <div class="">
            {{ $slot }}
        </div>
    </div>
</div>
