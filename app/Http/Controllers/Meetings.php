<?php

namespace App\Http\Controllers;

use App\Http\Resources\Meeting as MeetingResource;
use Illuminate\Http\Request;
use App\Meeting;

class Meetings extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $meeting = Meeting::all();
        return MeetingResource::collection($meeting);
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
        $meeting = new meeting;
        //return 

        //$meeting = findOrFail($id);//request()->segment(3); //Getting data from the url

        $meeting->M_address = $request->m_address;
        $meeting->M_date = $request->m_date;
        $meeting->M_time = $request->m_time;
        $meeting->M_agenda = $request->m_agenda;
        $meeting->M_minutes = $request->m_minutes;
        $meeting->M_type = $request->m_type;

        $meeting->created_at = now();

        $meeting->save();

        return response(['meeting_id' => $meeting->id, 'message' => 'meeting reported']);
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
        $meeting = Meeting::findOrFail($id);
        //$user->meeting;
        return new MeetingResource($meeting);
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
        $meeting = Meeting::where('id', $id)->update($request->all());
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
        $meeting = Meeting::find($id);
        $meeting->delete();
        return response(['meeting' => $id, 'message' => 'meeting successfully deleted']);
    }

    public function getAll()
    {
        $meeting = Meeting::all();
        return MeetingResource::collection($meeting);
    }
}
