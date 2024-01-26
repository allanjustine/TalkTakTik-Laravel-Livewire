<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use App\Models\Log;
use App\Models\User;
use App\Models\Post;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public function index() {
        $allPosts = Post::count();
        $visitors = Contact::count();
        $posts = Post::where('user_id', auth()->user()->id)->count();
        $logs = Log::count();
        $permissions = Permission::count();
        $roles = Role::count();
        $users = User::count();

        return compact('allPosts', 'visitors', 'logs', 'posts', 'permissions', 'roles', 'users');
    }
    public function render()
    {
        return view('livewire.admin.index', $this->index());
    }
}
