@extends('base')

@section('title', 'Logs')

@extends('navbar')

@section('content')
    <div class="container">
        <div class="d-grid gap-2 d-md-flex mt-2">
            <h1 style="font-family: Comic Sans MS">Activity Log</h1>
        </div>
        <table class="table table-bordered table-striped table-sm table-hover">
            <thead style="background-color: rgba(127, 169, 199, 0.527)">
                <th>Timestamp</th>
                <th>Log Entry</th>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $log->created_at->format('l, d F Y g:i A') }}</td>
                        <td>{{ $log->log_entry }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $logs->links() }}
        <div class="form-group mb-2 d-grip gap-2 d-md-flex justify-content-end">
            <a class="btn btn-info mx-2" href="{{ '/contact' }}">
                back
            </a>
        </div>
    </div>
@endsection
