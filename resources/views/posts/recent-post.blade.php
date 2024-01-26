@extends('base')

@extends('navbar')

@section('title', 'Recent Posts')

@section('content')
    <div>
        <livewire:posts.recent-post/>
    </div>
@endsection
