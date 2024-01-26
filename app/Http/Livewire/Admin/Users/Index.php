<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Events\UserLog;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $name, $email, $password, $gender, $password_confirmation, $image;
    public $role;
    public $roles;
    public $userId, $userDelete;

    protected $paginationTheme = 'bootstrap';

    public function addUser()
    {
        $this->validate([
            'name'                       =>          ['required', 'string', 'max:255', 'unique:users'],
            'email'                      =>          ['required', 'email', 'max:255', 'unique:users'],
            'gender'                     =>          ['required', 'string', 'max:255'],
            'password'                   =>          ['required', 'confirmed', 'string', 'max:255', 'min:6'],
            'image'                      =>          ['required', 'image', 'max:1024'],
            'role'                       =>          ['required']
        ]);

        $token = Str::random(24);
        $path = $this->image->store('public/images');
        $users = User::create([
            'name'                       =>          $this->name,
            'email'                      =>          $this->email,
            'gender'                     =>          $this->gender,
            'password'                   =>          bcrypt($this->password),
            'image'                      =>          $path,
            'remember_token'             =>          $token
        ]);

        $users->assignRole(Role::find($this->role));

        Mail::send('auth.verification-email', ['user' => $users], function ($mail) use ($users) {
            $mail->to($users->email);
            $mail->subject('Account verification');
        });

        $log_entry = auth()->user()->name . ' added ' . $users->name . ' user';
        event(new UserLog($log_entry));

        return redirect('admin/users')->with('message', ' New user added please verify their email to continue');
    }

    public function editUsers(int $userId)
    {
        $user = User::find($userId);
        if ($user) {
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->image = $user->image;
            $this->email = $user->email;
            $this->gender = $user->gender;
            $this->role = User::find($this->userId)->roles->pluck('id')->toArray();
        } else {
            return redirect()->to('admin/users');
        }
    }
    public function updateUsers()
    {
        $this->validate([
            'email'                      =>          ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->userId],
        ]);
        $user = User::find($this->userId);
        $path = $this->image->store('public/images');
        $user->update([
            'name'             =>      $this->name,
            'image'            =>      $path,
            'email'            =>      $this->email,
            'gender'           =>      $this->gender,
        ]);
        $user->syncRoles($this->role);
        $user->save();

        $log_entry =  auth()->user()->name . ' updated a user';
        event(new UserLog($log_entry));

        return redirect('admin/users')->with('message', ' User updated successfully');

        $this->reset();
    }

    public function delete($userId)
    {
        $this->userDelete = $userId;
    }

    public function deleteUsers($userId)
    {
        if ($userId == auth()->user()->id) {
            return redirect('admin/users')->with('message', 'You cannot delete your own account.');
        }
        User::find($this->userDelete)->delete();

        $log_entry =  auth()->user()->name . ' deleted a user';
        event(new UserLog($log_entry));

        return redirect('admin/users')->with('message', 'User has been deleted successfully');
    }
    public function render()
    {
        $this->roles = Role::all();
        $users = User::where('name', 'like', '%' . $this->search . '%')->orderBy('id')->paginate(5);
        return view('livewire.admin.users.index', compact('users'), ['image' => $users]);
    }
}
