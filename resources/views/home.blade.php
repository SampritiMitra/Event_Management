@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Events Action
                    <br>
                    <ul>
                    <li><a href="/created">Created Events</a></li>
                    <li><a href="/accepted">Accepted Events</a></li>
                    <li><a href="/pending">Pending Event Requests</a></li>
                    <li><a href="/create">Create Event</a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
