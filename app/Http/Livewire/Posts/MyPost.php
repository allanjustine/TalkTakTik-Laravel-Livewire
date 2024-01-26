<?php

namespace App\Http\Livewire\Posts;
use App\Models\Post;
use Livewire\Component;
use App\Events\UserLog;

class MyPost extends Component
{
    public $title, $content, $post_id;

    public function addPost() {
        $this->validate([
            'content'               =>      ['required', 'string', 'max:255'],
        ]);

        $post = Post::create([
            'user_id'                 =>      auth()->user()->id,
            'title'                   =>      $this->title,
            'content'                 =>      $this->content
        ]);
        $log_entry = $post->user->name . ' added a post';
        event(new UserLog($log_entry));

        return redirect('/my-post')->with('message', 'Posted');
    }

    public function loadPost() {
        $posts = Post::where ('user_id', auth()->user()->id)
        ->orderBy('id', 'desc')
        ->limit(50)
        ->get();

        return compact('posts');
    }
    public function editPosts(int $post_id) {
        $post = Post::find($post_id);
        if($post){
            $this->post_id = $post->id;
            $this->title = $post->title;
            $this->content = $post->content;
        }else{
            return redirect()->to('my-post');
        }
    }
    public function updatePosts() {
        $this->validate([
            'content'                      =>          ['required', 'string', 'max:255'],
        ]);

        Post::where('id', $this->post_id)->update([
            'user_id'                 =>      auth()->user()->id,
            'title'                      =>      $this->title,
            'content'                     =>      $this->content,
        ]);
        $log_entry = auth()->user()->name .  ' updated a post';
        event(new UserLog($log_entry));

        return redirect('my-post')->with('message', ' Post updated successfully');
    }

    public function delete($postId) {
        $this->postDelete = $postId;
    }
    public function deletePost() {

        Post::find($this->postDelete)->delete();

        $log_entry = auth()->user()->name . ' deleted a post';
        event(new UserLog($log_entry));

        return redirect('/my-post')->with('message', 'Post has been deleted successfully');
    }


    public function render()
    {
        return view('livewire.posts.my-post', $this->loadPost());
    }
}
