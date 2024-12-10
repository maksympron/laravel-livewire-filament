<div class="p-4">
    <div wire:loading.flex class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
        <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500 border-opacity-75"></div>
    </div>
@if ($selectedNews)
        <div>
            <h2 class="text-2xl">{{ $selectedNews->title }}</h2>
            <p>{{ $selectedNews->content }}</p>
            <button class="mt-4 bg-blue-500 text-white px-4 py-2" wire:click="selectNews(null)">Back</button>
        </div>
    @else
        <h2 class="text-xl mb-4">News</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

            @foreach ($newsList as $news)
                <x-post-card :post="$news" />
            @endforeach

        </div>
    @endif
</div>
