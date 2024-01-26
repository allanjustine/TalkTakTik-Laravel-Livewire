@extends('base')

@extends('navbar')

@section('title', 'Admin | Roles')

@section('content')
    <div class="container">
        <livewire:admin.roles.index/>
    </div>

@endsection
