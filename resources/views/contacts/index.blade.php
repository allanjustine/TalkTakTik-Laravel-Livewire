@extends('base')

@extends('navbar')

@section('title', 'Contacts')

@section('content')
    <div class="container m-5">
        <div class="row">
            <div class="col-md-4">
                @if (session('message'))
                    <div id="messagee" class="alert alert-success">{{ session('message') }}</div>
                @endif
                <livewire:contacts.create/>
            </div>
            <div class="col-md-8">
                <livewire:contacts.index/>
            </div>
        </div>
    </div>

@endsection
