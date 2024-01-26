@extends('base')

@extends('navbar')

@section('title', 'Admin | Permissions')

@section('content')
    <div class="container">
        <livewire:admin.permissions.index/>
    </div>

@endsection
