<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <img src="{{ asset('images/b.png') }}" alt="logo" class="img-fluid rounded-circle img-responsive" title="brand logo"
        style="width: 60px; margin-left: 50px; cursor: pointer">
    <a href="#" style="text-decoration: none;">
        <h2 class="p-2 text-white" style="font-family: Comic Sans MS"><span
                style="color:rgb(3, 3, 114)">Talk</span>Tak<span style="color:rgb(13, 243, 63)">Tik</span></h2>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex align-items-center justify-content-center">
            @role('admin')
                <li class="nav-item">
                    <a style="margin-left: 20px"
                        class="nav-link text-white {{ 'admin' == request()->path() ? 'active' : '' }}"
                        href="{{ '/admin' }}">Dashboard</a>
                </li>
            @endrole
            @role('user')
                <li class="nav-item">
                    <a class="nav-link text-white {{ 'dashboard' == request()->path() ? 'active' : '' }}"
                        href="{{ '/dashboard' }}">Dashboard</a>
                </li>
            @endrole
            <li class="nav-item">
                <a class="nav-link text-white {{ 'recent-post' == request()->path() ? 'active' : '' }}"
                    href="{{ '/recent-post' }}">Recent Posts</a>
            </li>
            @role('admin')
                <span class="nav-line"></span>
                <li class="nav-item">
                    <a class="nav-link text-white {{ 'contact' == request()->path() ? 'active' : '' }}"
                        href="{{ '/contact' }}">Contacts</a>
                </li>
                <span class="nav-line"></span>
                <li class="nav-item">
                    <a class="nav-link text-white {{ 'log' == request()->path() ? 'active' : '' }}"
                        href="{{ '/log' }}">Logs</a>
                </li>
                <span class="nav-line"></span>

                <div class="dropdown">
                    <a class="btn dropdown-toggle" id="buttt" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin Settings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="select3">
                        <span class="nav-line"></span>
                        <li class="nav-item">
                            <a style="margin-left: 20px"
                                class="nav-link text-white {{ 'admin/roles' == request()->path() ? 'active' : '' }}"
                                href="{{ route('admin.roles.index') }}">Roles</a>
                        </li>
                        <span class="nav-line"></span>
                        <li class="nav-item">
                            <a style="margin-left: 20px"
                                class="nav-link text-white {{ 'admin/permissions' == request()->path() ? 'active' : '' }}"
                                href="{{ route('admin.permissions.index') }}">Permissions</a>
                        </li>
                        <li class="nav-item">
                            <a style="margin-left: 20px"
                                class="nav-link text-white {{ 'admin/users' == request()->path() ? 'active' : '' }}"
                                href="{{ route('admin.users.index') }}">Users</a>
                        </li>
                    </div>
                </div>
            @endrole
        </ul>
        <ul class="navbar-nav ms-auto">
            <div class="dropdown dropstart">
                <img src="
                {{ Auth::user()->gender === 'Male' ? asset('images/male.png') : '' }}
                {{ Auth::user()->gender === 'Female' ? asset('images/female.png') : '' }}
                {{ Auth::user()->gender === 'Transgender' ? asset('images/transgender.png') : '' }}
                {{ Auth::user()->gender === 'Bisexual' ? asset('images/bisexual.png') : '' }}
                "
                    title="profile" class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="margin-right: 15px; font-size: 35px; cursor: pointer; padding: 5px 9px 5px 9px; border: 1px solid black; border-radius: 50%; width: 50px; height: 50px;; background-color:rgba(255, 255, 255, 0.531)">
                <ul class="dropdown-menu" id="select2">
                    <img id="profile-image"
                        style="width: 35px; border: 1px solid rgb(246, 246, 246); padding: 4px; height: 35px; border-radius: 50%;"
                        src="
                    {{ Auth::user()->gender === 'Transgender' ? asset('images/transgender.png') : '' }}
                    {{ Auth::user()->gender === 'Male' ? asset('images/male.png') : '' }}
                    {{ Auth::user()->gender === 'Female' ? asset('images/female.png') : '' }}
                    {{ Auth::user()->gender === 'Bisexual' ? asset('images/bisexual.png') : '' }}
                    ">
                    <span id="profile-name"><a href="{{ '/my-post' }}">{{ Auth::user()->name }}</a></span>
                    <li><a class="dropdown-item mt-4" href="{{ '/my-post' }}" id="select"><i
                                class="fa-light fa-square-user"></i> My Post</a></li>
                    <li><a href="#" class="dropdown-item" id="select" data-toggle="modal"
                            data-target="#modal-logout"><i class="fa-regular fa-right-from-bracket"></i> Logout</a></li>
                </ul>
            </div>
        </ul>
    </div>
</nav>


<div wire:ignore.self class="modal fade" id="modal-logout" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="log-out-a">
            <div class="modal-header">
                <h5 class="modal-title title3 text-black" id="exampleModalLabel">Are you sure you want to proceed to
                    logout?</h5>
                <button type="button" class="close-logout" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center text-black">You will redirect to log in page</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" id="closee" data-dismiss="modal">Close</button>
                <a href="{{ '/logout' }}"><button type="button" id="submit-button"
                        class="btn btn-danger form-control">Yes</button></a>
            </div>
        </div>
    </div>
</div>

<style>
    #profile-name {
        font-size: 18px;
        border-bottom: 1px solid white;
        padding-bottom: 10px;
    }

    .close-logout:hover {
        background-color: rgb(92, 89, 89);
    }

    .close-logout {
        color: white;
        border-radius: 50%;
        background-color: rgb(113, 111, 111);
        border: none;
        width: 30px;
    }

    #profile-image {
        margin-left: 15px;
    }

    #buttt {
        border: none;
        background-color: rgba(17, 162, 172, 0.37);
        width: 145px;
        color: rgb(255, 255, 255);
    }

    #buttt:hover {
        background-color: rgb(17, 162, 172);
    }

    #profile-name a {
        text-decoration: none;
        color: rgb(225, 222, 222);
    }

    #profile-name a:hover {
        background-color: rgba(255, 255, 255, 0);
        color: rgb(255, 255, 255);
    }

    .navbar-nav a {
        margin-left: 20px;
        margin-right: 20px;
        border-radius: 5px;
        width: 120px;
        margin: 5px;
        text-align: center;
    }

    .navbar-nav a:hover {
        background-color: rgb(17, 162, 172);
        border-radius: 5px;
    }

    .navbar {
        background-image: linear-gradient(to right, rgb(99, 34, 228), rgb(19, 131, 65));
    }

    .active {
        background-color: rgb(17, 162, 172);
    }

    #select {
        color: white;
    }

    #select2 {
        background-color: rgb(19, 131, 65);
        width: 300px;
    }

    #select3 {
        background-color: rgb(19, 131, 65);
    }

    #select2 li:hover {
        background-color: rgb(17, 162, 172);
    }

    #closee {
        border: 1px solid rgb(107, 107, 107);
        background-color: rgb(216, 214, 214);
    }

    #closee:hover {
        background-color: rgb(171, 166, 166);
    }

    #log-out-a {
        background-image: linear-gradient(to right, rgb(217, 217, 221), rgb(196, 196, 199), rgb(174, 175, 174));
    }
</style>
