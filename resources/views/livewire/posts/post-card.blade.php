<!-- component -->
<!-- Create By Joker Banny -->
<div class=" bg-gray-100 flex justify-center items-center" x-data="{ clamp: true }" x-cloak>
    <div class="max-w-[480px] container border w-full bg-white  shadow-lg transform transition duration-500 ">
        <div>
            {{--    <span class="text-sm font-bold rounded-lg bg-gray-100 inline-block mt-4 ml-4 py-1.5 px-4 cursor-pointer">
                <i class="linker">{!! '@' . $post->user->username !!}</i>

            </span> --}}
            <h1
                class="text-2xl mt-2 ml-4 font-bold ellipsis text-gray-800 cursor-pointer hover:text-gray-900 transition duration-100">
                {{ $post->title }}</h1>
            <div class="ml-4 text-xs  my-0 mt-1"><small>Publicado {{ ago($post->created_at) }}</small></div>
            <p class="mx-4 mt-1 mb-2 text-gray-900 text-sm hyphens-auto text-justify  " @click.outside="clamp = true">
                <span class="leading-[1.10rem] transition-all duration-200 ease-linear"
                    :class="clamp ? 'line-clamp-2' : 'line-clamp-none'"> {{ $post->content }}</span>
                @if (strlen($post->content) > 100)
                    <span x-show="clamp"
                        class="text-gray-400 w-full text-right hover:text-blue-600 select-none cursor-pointer"
                        @click="clamp = false">Leer más</a>
                @endif
            </p>
        </div>
        <div class="px-4">
            @if ($post->image)
                <img src="{{ $post->image->path }}" alt="image"
                    class="w-full  h-[28rem] max-h-[28rem] lg:h-[30rem] lg:max-h-[30rem] outline-dashed rounded-lg outline-6 outline-gray-300 object-cover"
                    loading="lazy">
            @else
                <div style="background-color: {{ $post->bg_color }}"
                    class="w-full h-[28rem] max-h-[28rem] lg:h-[30rem] lg:max-h-[30rem] outline-dashed rounded-lg outline-6 outline-gray-300 flex items-center justify-center px-8 text-justify hyphens-auto text-xl font-bold {{$post->text_color}}">
                    <span>
                        {{ ellipsis($post->content, 255) }}
                    </span>
                </div>
            @endif
        </div>

        <div class="flex p-4 justify-between">
            <div class="flex items-center space-x-2">
                <img class="w-8 rounded-full" src="{{ avatar($post->user->name) }}" alt="avatar" />
                <h2 class="text-gray-800 text-base font-bold cursor-pointer">{{ ellipsis($post->user->name, 20) }}</h2>
            </div>
            <div class="flex space-x-2 items-center">
                <div>
                    <livewire:interactions.comments :model="$post" />
                </div>
                <div>
                    <livewire:interactions.likes :model="$post" />
                </div>
            </div>
        </div>
    </div>
</div>
