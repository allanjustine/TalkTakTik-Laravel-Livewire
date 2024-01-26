<div>
    <div class="container mt-2">
        <h1>Admin Users</h1>
        @include('livewire.modals.admin-modal')
        @if (session('message'))
            <div class="alert alert-success text-black text-center" id="messagee">{{ session('message') }}</div>
        @endif
        <div class='btn btn-primary btn-sm float-end mb-2' data-toggle="modal" data-target="#modal-user">Add User</div>
        <input type="search" class="form-control float-end mx-2" style="width: 250px;" placeholder="Search"
            wire:model.lazy="search">
        <div class="card-body">
            <table class="table table-striped shadow table-bordered table-md table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                @if (!$image && isset($user->image))
                                    <img style="width: 80px; border-radius: 10px;"
                                        src="{{ Storage::url($user->image) }}">
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    {{ $role->name }}
                                @endforeach
                            </td>
                            <td>
                                <a href="" class="btn btn-primary" id="ic" title="Edit"
                                    data-toggle="modal" data-target="#update-modal-users"
                                    wire:click="editUsers({{ $user->id }})"><i class=" fa fa-gear"></i></a>
                                <a href="" class="btn btn-danger" id="ic" title="Delete"
                                    data-toggle="modal" data-target="#delete-modal-users"
                                    wire:click="delete({{ $user->id }})"><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @if ($users->count() == 0)
                        <td colspan="4" class="text-center">
                            {{ '"' . $search . '"' }} user not found in this table.
                        </td>
                    @endif
                </tbody>
            </table>
        </div>
        <div>
            {{ $users->links() }}
        </div>
    </div>
</div>

<style>
    .close {
        border-radius: 50%;
        width: 25px;
        border: none;
    }

    .close span {
        color: black;
    }

    .close:hover {
        background-color: rgb(214, 211, 211);
    }

    .title3 {
        margin-left: 8%;
    }

    .title1 {
        margin-left: 38%;
    }

    .title2 {
        margin-left: 35%;
    }
</style>
