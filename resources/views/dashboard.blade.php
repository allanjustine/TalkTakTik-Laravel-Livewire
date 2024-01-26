@extends('base')

@extends('navbar')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1 style="font-family: Comic Sans MS">Dashboard</h1>
        <div class="content">
            <div class="row mt-5 text-center">
                <div class="col-md-3 mb-2">
                    <div class="card shadow">
                        <a href="/recent-post" id="dash-link">
                            <div class="card-body rounded">
                                <div class="row">
                                    <div class="col">
                                        <i class="fa fa-history text-white mt-2" id="dash-icon"></i>
                                    </div>
                                    <div class="col mt-4">
                                        <span class="text-white float-right" id="text">Recent Post</span><br>
                                        <span class="text-white" id="text2">{{ $allPosts }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @role('admin')
                    <div class="col-md-3 mb-2">
                        <div class="card shadow">
                            <a href="/contact" id="dash-link">
                                <div class="card-body rounded">
                                    <div class="row">
                                        <div class="col">
                                            <i class="fa fa-user text-white mt-2" id="dash-icon"></i>
                                        </div>
                                        <div class="col mt-4">
                                            <span class="text-white float-right" id="text">Total Visitors</span><br>
                                            <span class="text-white" id="text2">{{ $visitors }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="card shadow">
                            <a href="/log" id="dash-link">
                                <div class="card-body rounded">
                                    <div class="row">
                                        <div class="col">
                                            <i class="fa fa-book text-white mt-2" id="dash-icon"></i>
                                        </div>
                                        <div class="col mt-4">
                                            <span class="text-white float-right" id="text">Total Logs</span><br>
                                            <span class="text-white" id="text2">{{ $logs }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endrole
                <div class="col-md-3">
                    <div class="card shadow">
                        <a href="/my-post" id="dash-link">
                            <div class="card-body rounded">
                                <div class="row">
                                    <div class="col">
                                        <i class="fa fa-thumbs-o-up text-white mt-2" id="dash-icon"></i>
                                    </div>
                                    <div class="col mt-4">
                                        <span class="text-white float-right" id="text">Your Posts</span><br>
                                        <span class="text-white" id="text2">{{ $posts }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <section style="margin-top: 5%">
            <div class="row">
                <h3 style="font-family: Comic Sans MS">Activity</h3>
                <hr>
                <div class="col-sm-6 mt-3">
                    <h5 style="font-family: Comic Sans MS">Recent Post</h5>
                    <div class="recent-only">
                        <livewire:posts.dash-recent-post />
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <h5 style="font-family: Comic Sans MS">User Accounts</h5>
                    <div class="recent-only">
                        <livewire:users.users />
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<style>
    .card {
        width: 240px;
    }

    .card:hover {
        transform: scale(1.02);
        transition: transform 0.1s ease;
    }

    .card-body {
        background-image: linear-gradient(to right, rgb(99, 34, 228), rgb(19, 131, 65));
        height: 110px;
    }

    .card-body:hover {
        background-image: linear-gradient(to right, rgb(68, 9, 185), rgb(10, 89, 43));
    }

    #dash-icon {
        font-size: 60px;
        opacity: 0.5;
    }

    #dash-link {
        text-decoration: none;
    }

    #text {
        font-size: 15px;
    }

    #text2 {
        opacity: 0.8;
        font-style: italic;
    }

    .time {
        opacity: 0.8;
    }

    .recent-only {
        border: 1px solid rgba(0, 0, 0, 0.23);
        border-radius: 10px;
        box-shadow: 3px 3px 1px 0px rgba(0, 0, 0, 0.2);
    }
</style>
