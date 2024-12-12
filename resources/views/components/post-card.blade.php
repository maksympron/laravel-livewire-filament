<div
    wire:key="{{$post->id}}"
    wire:click.prevent="selectNews({{ $post->id }})"
    class="bg-gray-800 cursor-pointer rounded-lg overflow-hidden shadow-md hover:scale-[101%] transition-all duration-300"
>
    <img
        src="{{ $post->image ? (Str::startsWith($post->image, 'http') ? $post->image : Storage::url($post->image)) : asset('assets/default.png') }}"
        alt="{{$post->title}}"
        class="h-40 w-full object-cover"
    />
    <div class="p-4">
        <p class="text-white text-lg font-semibold mb-2">
            {{$post->title}}
        </p>
        <p class="text-gray-400 text-sm line-clamp-3 h-20 max-h-20">
            {{$post->content}}
        </p>
    </div>
</div>
