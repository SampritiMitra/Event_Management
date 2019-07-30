@extends('layouts.app')
@section('content')
<?php
$arr = get_defined_vars();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Events</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    	Event Topic: <br>
                    	Start_Time: <br>
                    	End_Time:
                    	
                    <br>
                    Members:<br>
                    @if(array_key_exists('members', $arr))
                    @foreach($members as $member)
                    	User_Name: {{$member->name}}
                    @endforeach
                    @endif
                    <br>

                    @if(array_key_exists('pending', $arr))
                        <form method="POST" action="/accepted">
                            @csrf
                            <button type="submit">Accept</button>
                        </form>
                        <form method="POST" action="/">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
