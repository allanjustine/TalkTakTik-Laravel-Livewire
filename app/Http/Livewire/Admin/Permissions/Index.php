<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Events\UserLog;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;
    public $roles;
    public $name;
    public $search='';
    public $permissionId, $permissionDelete;

    protected $paginationTheme = 'bootstrap';

    public function addPermissions() {
        $this->validate([
            'name'                      =>          ['required', 'string', 'max:255', 'unique:permissions'],
        ]);
        $permissions = Permission::create([
            'name'                      =>          $this->name,
        ]);

        $log_entry = auth()->user()->name . ' added ' . $permissions->name . ' permission';
        event(new UserLog($log_entry));
        return redirect('admin/permissions')->with('message', ' New permissions added');
    }


    public function editPermissions(int $permissionId) {
        $permission = Permission::find($permissionId);
        if($permission){
            $this->permissionId = $permission->id;
            $this->name = $permission->name;
        }else{
            return redirect()->to('admin/permissions');
        }
    }
    public function updatePermissions() {
        $this->validate([
            'name'                      =>          ['required', 'string', 'max:255', 'unique:permissions'],
        ]);

        Permission::where('id', $this->permissionId)->update([
            'name'             =>      $this->name,
        ]);

        $log_entry =  auth()->user()->name . ' updated a permissions';
        event(new UserLog($log_entry));

        return redirect('admin/permissions')->with('message', ' Permissions updated successfully');
    }

    public function delete($permissionId) {
        $this->permissionDelete = $permissionId;
    }

    public function deletePermissions() {

        Permission::find($this->permissionDelete)->delete();

        $log_entry = auth()->user()->name . ' deleted a permissions';
        event(new UserLog($log_entry));

        return redirect('admin/permissions')->with('message', 'Permissions has been deleted successfully');
    }
    public function render()
    {
        $this->roles = Role::all();
        $permissions = Permission::where('name', 'like', '%' . $this->search . '%')->orderBy('id')->paginate(5);
        return view('livewire.admin.permissions.index', compact('permissions'));
    }
}
