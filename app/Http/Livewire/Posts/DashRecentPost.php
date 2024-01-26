<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class DashRecentPost extends Component
{
    public function recentPosts (){
        $recents = Post::orderBy('created_at', 'desc')
        ->limit(50)
        ->get();


        $allPosts = Post::count();
        return compact('recents', 'allPosts');
    }
    public function render()
    {
        return view('livewire.posts.dash-recent-post', $this->recentPosts());
    }
}
