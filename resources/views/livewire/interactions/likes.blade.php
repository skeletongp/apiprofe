<div class="flex w-16 justify-end space-x-0.5 items-center " wire:click="toggleLike" wire:target="toggleLike" wire:loading.class="animate-bounce">
    @if ($isLiked)
        <span class="ri-heart-2-fill ri-lg text-green-600"></span>
    @else
        <span class="ri-heart-2-line ri-lg text-gray-400"></span>
    @endif
    <span class="shortnumber text-sm" >{{ $likes }}</span>
</div>