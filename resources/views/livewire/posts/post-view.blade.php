<div class="pb-8" x-init x-cloak>
    <livewire:posts.new-post wire:key="{{ uniqid() }}" />
    <div class=" rounded flex flex-col space-y-1 bg-gray-300 mt-4">
        @foreach ($posts as $post)
            <livewire:posts.post-card :post="$post" wire:key="{{ $post->id }}" />
        @endforeach

    </div>
    {{-- load more button --}}
    <div class="flex justify-center mt-4">
        <button wire:click="loadMore" wire:loading.disabled id="load-more-button"
            class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-thin py-1 px-2 rounded flex items-center">
            <span class="ri-loader-fill animate-spin" wire:loading></span>
            <span class="ml-2">Ver más</span>
        </button>
    </div>
</div>
<script>
    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    window.addEventListener('livewire:load', function() {
        window.addEventListener('scroll', function() {
            if (isScrolledIntoView($('#load-more-button'))) {
                $('#load-more-button').click();
            }
        });
    });
</script>
