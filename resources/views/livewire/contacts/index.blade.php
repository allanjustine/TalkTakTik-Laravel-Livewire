<div>
    <div class="container" style="height: 360px;">
    <table class="table table-striped shadow border border-light table-hover">
        <div class="row">
            <div class="col">
                <select class="form-select" wire:model.lazy="sim_card" style="width: 135px; margin-left: 430px">
                    <option value="All">All Sim Card</option>
                    <option value="TNT">TNT</option>
                    <option value="Sun">Sun</option>
                    <option value="Globe">Globe</option>
                    <option value="TM">TM</option>
                    <option value="PLDT">PLDT</option>
                    <option value="Smart">Smart</option>
                </select>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Search" wire:model.lazy="search" style="width: 120px;">
            </div>
        </div>
        <thead style="background-color: rgba(127, 169, 199, 0.527)">
            <tr>
                <th>ID No</th>
                <th>Full Name</th>
                <th>Contact Number</th>
                <th>Email Address</th>
                <th>Address</th>
                <th>Sim Card</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->contact_number }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->address }}</td>
                    <td>{{ $contact->sim_card }}</td>
                    <td>
                        <a href="{{ url('edit', ['contact' => $contact->id]) }}" class="btn btn-primary" id="ic" title="Edit"><i class=" fa fa-gear"></i></a>
                    </td>
                    <td>
                        <a href="{{ url('delete', ['contact' => $contact->id]) }}" class="btn btn-danger" id="ic" title="Delete"><i class=" fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            @if($contacts->count() == 0)
                <td colspan="8" class="text-center">
                    {{ $search }} contact not found in this table.
                </td>
            @endif

        </tbody>
    </table>
    </div>
    <div style="margin-left: 10px;">
        {{ $contacts->links() }}
    </div>
</div>
<style>
    #ic {
        width: 40px;
    }
</style>
