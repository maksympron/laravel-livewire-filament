<div
    wire:key="{{$post->id}}"
    wire:click.prevent="selectNews({{ $post->id }})"
    class="bg-gray-800 cursor-pointer rounded-lg overflow-hidden shadow-md hover:scale-105 transition-all duration-300"
>
    <img
        src="{{ Str::startsWith($post->image, 'http') ? $post->image : Storage::url($post->image) }}"
        alt="{{$post->title}}"
        class="w-full h-40 object-cover"
    >

    <div class="p-4">
        <p class="text-white text-lg font-semibold mb-2">
            {{$post->title}}
        </p>

        <p class="text-gray-400 text-sm line-clamp-3">
            {{$post->content}} <!-- Adjust the field name based on your database -->
        </p>
    </div>
</div>
