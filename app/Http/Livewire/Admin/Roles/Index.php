<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Events\UserLog;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;
    public $name;
    public $roleId, $roleDelete;

    public $search='';

    protected $paginationTheme = 'bootstrap';

    public function addRoles() {
        $this->validate([
            'name'                      =>          ['required', 'string', 'max:255', 'unique:roles'],
        ]);
        $roles = Role::create([
            'name'                      =>          $this->name,
        ]);

        $log_entry = auth()->user()->name .  ' added ' . $roles->name . ' roles';
        event(new UserLog($log_entry));
        return redirect('admin/roles')->with('message', ' New role added');
    }

    public function editRoles(int $roleId) {
        $role = Role::find($roleId);
        if($role){
            $this->roleId = $role->id;
            $this->name = $role->name;
        }else{
            return redirect()->to('admin/roles');
        }
    }
    public function updateRoles() {
        $this->validate([
            'name'                      =>          ['required', 'string', 'max:255', 'unique:roles'],
        ]);

        Role::where('id', $this->roleId)->update([
            'name'             =>      $this->name,
        ]);

        $log_entry =  auth()->user()->name . ' updated a roles';
        event(new UserLog($log_entry));

        return redirect('admin/roles')->with('message', ' Roles updated successfully');
    }

    public function delete($roleId) {
        $this->roleDelete = $roleId;
    }

    public function deleteRoles() {

        Role::find($this->roleDelete)->delete();

        $log_entry =  auth()->user()->name . ' deleted a roles';
        event(new UserLog($log_entry));

        return redirect('admin/roles')->with('message', 'Roles has been deleted successfully');
    }

    public function render()
    {
        $roles = Role::where('name', 'like', '%' . $this->search . '%')->orderBy('id')->paginate(5);
        return view('livewire.admin.roles.index', compact('roles'));
    }
}
