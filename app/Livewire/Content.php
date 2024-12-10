<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Content extends Component
{
    public $selectedNews;

    public function selectNews($id)
    {
        $this->selectedNews = Post::find($id);
    }

    public function render()
    {
        return view('livewire.content', [
            'newsList' => Post::where('is_active', true)->get(),
        ]);
    }

}
