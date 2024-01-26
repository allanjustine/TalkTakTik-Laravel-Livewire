<div>

    <div class="card shadow border border-light">
        <div class="card-header bg-danger">
            <h5 class="text-white text-center mt-2">Delete Student?</h5>
        </div>
        <div class="card-body">
            <div class="col-md-4 offset-md-4">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="img-fluid mb-3 rounded-circle mt-3 img-responsive center-block d-block mx-auto" style="width: 90px;">
            </div>
            <table class="table">
                <tr>
                    <th style="border-right: 1px solid rgba(118, 116, 116, 0.67)">
                        Name
                    </th>
                    <td>
                        {{ $this->contact->name }}
                    </td>
                </tr>
                <tr>
                    <th style="border-right: 1px solid rgba(118, 116, 116, 0.67)">
                        Contact Number
                    </th>
                    <td>
                        {{ $this->contact->contact_number }}
                    </td>
                </tr>
                <tr>
                    <th style="border-right: 1px solid rgba(118, 116, 116, 0.67)">
                        Sim Card
                    </th>
                    <td>
                        {{ $this->contact->sim_card }}
                    </td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                <button class="btn btn-danger" wire:click="delete()">
                    <div wire:loading><svg class="loading"></svg></div>
                    Delete
                </button>
                <button class="btn btn-info mx-2" wire:click="back()">
                    Cancel
                </button>
            </div>
        </div>
    </div>

</div>

<style>
    .loading {
        border: 5px solid rgba(255, 255, 255, 0.359);
        border-radius: 50%;
        width: 25px;
        height: 25px;
        border-top: 5px solid rgb(246, 246, 246);
        animation: rotate 0.8s infinite;
        justify-items: center;
        display: inline-block;
    }
    @keyframes rotate {
        0% {transform: rotate(0deg);}
        100% {transform: rotate(360deg);}
    }
</style>
