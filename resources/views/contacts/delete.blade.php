@extends('base')

@extends('navbar')

@section('title', 'Delete')

@section('content')
<div class="container m-5">
        <div class="col-sm-5 offset-sm-4">
            <div>
                <livewire:contacts.delete :contactId="$id"/>
            </div>
        </div>
    </div>
</div>
@endsection
