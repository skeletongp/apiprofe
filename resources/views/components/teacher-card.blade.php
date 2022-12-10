@php
    $cant = rand (1*10, 5*10) / 10;
@endphp
<div class="w-full h-16 border rounded-md flex space-x-2 items-center px-2">
    <div class="w-12 h-12 min-w-[3rem] min-h-[3rem] rounded-full  bg-center bg-cover"
        style="background-image: url({{ avatar('Juan Ignacio Polanco') }})">
    </div>
    <div class="flex flex-col justify-center  w-full">
        <span class="text-sm font-semibold ellipsis w-full">Juan Ignacio Polanco</span>
        <span class="text-gray-600 text-xs w-full ellipsis">Psicología del niño</span>
    </div>
    <div class="flex flex-col justify-center  w-16 min-w-[4rem] ">
        <div class="flex text-xs justify-end space-x-1">
            <span>{{ $cant }}</span>
            <span class="flex space-x-0">
                @for ($i = 0; $i < floor($cant); $i++)
                    <span class="ri-star-fill ri-sm text-yellow-500"></span>
                @endfor
                @if (floor($cant) != $cant)
                    <span class="ri-star-half-fill ri-sm text-yellow-500"></span>
                @else
                    <span class="ri-star-fill ri-sm text-yellow-500"></span>
                @endif
            </span>
        </div>
        <div class="flex text-xs justify-end space-x-1">
            <span class="ellipsis">{{ shortNumber($cant * 5800) }}</span>
            <span class="ri-group-fill ri-xs"></span>

        </div>
    </div>
</div>
