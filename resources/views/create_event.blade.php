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

                    @if(array_key_exists('create',$arr))
                    <form method="POST" action="/create">
                    	@csrf
                    	Event Topic<input type="text" name="topic"><br>
                    	Start_Time<input type="text" name="start_time"><br>
                    	End_Time<input type="text" name="end_time">
                    	<button type="submit">Create</button>
                    </form>
                    @endif

                    @if(array_key_exists('created',$arr))
                    <form method="POST" action="/created">
                        @csrf
                        @method('patch')
                        @if(array_key_exists('e_id',$arr))
                            ID <input type="text" name="event_id" value="{{$e_id}}" readonly><br>
                        @endif
                        Event Topic<input type="text" name="topic"><br>
                        Start_Time<input type="text" name="start_time"><br>
                        End_Time<input type="text" name="end_time">
                        <button type="submit">Update</button>
                    </form>
                    @endif

                    <br>
                    Members:<br>
                    @if(array_key_exists('members', $arr))
                    @foreach($members as $member)
                    <form method="POST" action="/del">
                    	@csrf
                    	User_Name: {{$member->name}}
                    	<button type="submit">Delete</button>
                    </form>
                    @endforeach
                    @endif
                    <br>
                    Invite:
                    <form method="POST" action="/inv">
                    	@csrf
                    	User_Name<input type="text" name="u_name"><br>
                         @if(array_key_exists('e_id',$arr))
                            <input name="event_id" type="hidden" value="{{$e_id}}">
                        @endif
                        
                    	<button type="submit">Invite</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
