<div class="container">
    <div class="post-body">
        <div class="offset-1" style="height: 48vh; overflow:auto; overflow-x: hidden;">
                @role('admin')
                <span>Total users: <span class="all-count px-2">{{ $allUsers }}</span></span>
                @endrole
                <span>Active users: <span class="active-count px-2">{{ $usersVerifiedCount }}</span></span>
                @role('admin')
                <span>Unverified users: <span class="unverified-count px-2">{{ $usersNotVerifiedCount }}</span></span>
                @endrole
            @foreach ($users as $user)
            <div class="row">
                <span class="name mt-3"> {{ $user->name }} <span class="time">account was created</span></span>
                <span class="time" id="time">at {{ $user->created_at->format('l, d F Y g:i A') }} </span>
            </div>
            @endforeach
            @if($users->isEmpty())
            <div class="text-gray-500">
                <h5 class="text-center mt-3">No users found.</h5>
            </div>
            @endif
            @role('admin')
            <div class="row">
            @foreach ($usersNull as $null)
                <span class="name mt-3"> {{ $null->name }} <span class="time">account was created</span></span>
                <span class="time" id="not-active">at {{ $null->created_at->format('l, d F Y g:i A') }} </span>
            @endforeach
            </div>
            @endrole
        </div>
    </div>
</div>

<style>
    .all-count {
        border-radius: 50%;
        background-color: rgb(201, 128, 128);
    }
    .active-count {
        border-radius: 50%;
        background-color: rgb(25, 190, 25);
    }
    .unverified-count {
        border-radius: 50%;
        background-color: yellow;
    }
    #time::after {
        content: "Active";
        outline: 1px solid black;
        padding: 0px 5px 0px 5px;
        border-radius: 5px;
        font-size: 12px;
        font-weight: bold;
        background-color: rgb(25, 190, 25);
        color: black;
    }
    #not-active::after {
        content: "Unverified";
        outline: 1px solid black;
        padding: 0px 5px 0px 5px;
        border-radius: 5px;
        font-size: 12px;
        font-weight: bold;
        background-color: Yellow;
        color: black;
    }
</style>
