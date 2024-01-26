@extends('base')

@extends('navbar')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <livewire:admin.index/>
    </div>

@endsection
