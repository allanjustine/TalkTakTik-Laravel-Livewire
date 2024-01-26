<?php

namespace App\Http\Livewire\Posts;
use App\Models\Post;
use Livewire\Component;
use App\Events\UserLog;

class RecentPost extends Component
{
    public $search, $title = 'All';
    public $content, $post_id, $postDelete;

    public function recentPosts (){
        $query = Post::orderBy('id', 'desc')
            ->search($this->search);
            if($this->title != 'All') {
                $query->where('title', $this->title);
            }
            $recents = $query->get();
        return compact('recents');
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
            'title'                        =>      $this->title,
            'content'                      =>      $this->content,
        ]);
        $log_entry = auth()->user()->name . ' updated a post';
        event(new UserLog($log_entry));

        return redirect('recent-post')->with('message', ' Post updated successfully');
    }

    public function delete($postId) {
        $this->postDelete = $postId;
    }
    public function deletePost() {

        Post::find($this->postDelete)->delete();

        $log_entry = auth()->user()->name . ' deleted a post';
        event(new UserLog($log_entry));

        return redirect('/my-post')->with('message', ' Post has been deleted successfully');
    }

    public function render()
    {
        return view('livewire.posts.recent-post', $this->recentPosts());
    }
}
