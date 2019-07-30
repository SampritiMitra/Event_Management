<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\event_creator;
use App\invite_status;

class eventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        return view('home'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEventForm()
    {
        $create='create';
        return view('create_event',compact('create'));
    }

    public function create(Request $request){

        $event=new event_creator;
        $event->user_id=auth()->id();
        $event->event_topic=$request['topic'];
        $event->start_time=$request['start_time'];
        $event->end_time=$request['end_time'];
        $event->save();

        //once you are invited
        $invite_stat=new invite_status;
        $invite_stat->user_id=auth()->id();
        $invite_stat->event_id=DB::table('event_creators')->where('user_id', auth()->id())->orderBy('event_id', 'desc')->first()->event_id;
        $e_id=$invite_stat->event_id;
        $invite_stat->status="Pending";
        $invite_stat->save();

       $created='created';
       return view('create_event',compact('e_id', 'created'));
    }

    public function created()
    {
        //
        $created='created';
        return view('create_event',compact('created'));
    }

    public function accepted()
    {
        //
        return view('accepted_event');
    }

    public function invite(Request $request)
    {
        //
        $invite_stat=new invite_status;
        $invite_stat->user_id=auth()->id();
        $invite_stat->event_id=$request['event_id'];
        $e_id=$invite_stat->event_id;
        $invite_stat->status="Pending";
        $invite_stat->save();
        return "Invitation sent";
    }

    public function pending()
    {
        //
        return view('accepted_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
