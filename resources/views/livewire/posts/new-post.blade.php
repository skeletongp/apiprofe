<div class="py-4">
    <div class="flex flex-col space-y-2 border px-1 py-1.5 rounded-lg">
        <small class="text-red-300">{{ $errors->has('image') ? 'La imagen elegida no es correcta' : '' }}</small>
        <div class=" flex flex-col items-center space-y-4">
            @if ($image)
                <div class="w-24 h-16 border rounded-lg bg-center bg-contain bg-no-repeat"
                    style="background-image: url({{ $image->temporaryUrl() }})"></div>
            @endif
            <label for="content" style="background-color: {{$bgColor}}" class="h-48 rounded-lg border flex justify-center items-center w-full mx-auto">
                <textarea placeholder="{{ $errors->has('content') ? 'Debes ingresar contenido' : 'Comparte algo...' }}."
                    class="ajustable text-center resize-none h-6 leading-[1.1rem] text-lg w-full {{$colors[$bgColor]}} {{ $errors->has('content') ? 'placeholder:text-red-300' : '' }} placeholder:{{$colors[$bgColor]}} placeholder:opacity-70 bg-transparent px-4 focus:outline-none focus:border-none focus:ring-0 " name="content" 
                    id="content"   wire:model.defer="content"></textarea>
            </label>
            
            <div class="flex items-center space-x-2">
                <div wire:click="$set('bgColor','#000000')" class="w-8 h-8 border-2 shadow-xl transform hover:scale-110 rounded-full" style="background-color: #000000"></div>
                <div wire:click="$set('bgColor','#0000ff')" class="w-8 h-8 border-2 shadow-xl transform hover:scale-110 rounded-full" style="background-color: #0000ff"></div>
                <div wire:click="$set('bgColor','#ff0000')" class="w-8 h-8 border-2 shadow-xl transform hover:scale-110 rounded-full" style="background-color: #ff0000"></div>
                <div wire:click="$set('bgColor','#00ff00')" class="w-8 h-8 border-2 shadow-xl transform hover:scale-110 rounded-full" style="background-color: #00ff00"></div>
                <div wire:click="$set('bgColor','#ffffff')" class="w-8 h-8 border-2 shadow-xl transform hover:scale-110 rounded-full" style="background-color: #ffffff"></div>
            </div>

        </div>
        <div class="flex justify-between items-center">
            <div class="w-8 h-8 min-w-[1.25rem] min-h-[1.25rem] rounded-full  bg-center bg-cover"
                style="background-image: url({{ avatar(auth()->user()->name) }})">
            </div>
            <div class="flex items-center justify-end space-x-4">
                <label class="px-2 border rounded-lg hover:bg-gray-100" for="file"><span
                        class="ri-attachment-2"></span></label>
                <x-button wire:click="store"><span class="ri-send-plane-line"></span></span></x-button>
            </div>
        </div>
    </div>
    <input type="file" wire:model="image" accept="image/png, image/jpeg" class="hidden" id="file">
</div>


{{--  <div>
    <span class="ri-add-circle-fill"></span>
 </div> --}}
