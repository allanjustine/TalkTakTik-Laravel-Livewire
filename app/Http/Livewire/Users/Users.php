<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function show()
    {
        $users = User::whereNOTNULL('email_verified_at')->get();
        $usersNull = User::whereNULL('email_verified_at')->get();
        $usersVerifiedCount = User::whereNOTNULL('email_verified_at')->count();
        $allUsers = User::count();
        $usersNotVerifiedCount = User::whereNULL('email_verified_at')->count();

        return compact('users', 'usersVerifiedCount', 'usersNotVerifiedCount', 'allUsers', 'usersNull');
    }
    public function render()
    {
        return view('livewire.users.users', $this->show());
    }
}
