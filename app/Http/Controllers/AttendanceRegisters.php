<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AttendanceRegister as AttendanceRegisterResource;
use App\AttendanceRegister;

class AttendanceRegisters extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $attendanceregister = AttendanceRegister::all();
        return AttendanceRegisterResource::collection($attendanceregister);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $cmemberID, $attendanceregisterID)
    {
        //
        $attendanceregister = new AttendanceRegister;
        //return 

        /**$incidentID = request()->segment(3); //Getting data from the url
        $incident = Incident::findOrFail($incidentID);
        $cmemberID = $incident->$c_member->$id;
        */
        $attendanceregister->attendanceregister_id = $cmemberID;
        $attendanceregister->c_member_id = $attendanceregisterID;        
        $attendanceregister->created_at = now();

        $attendanceregister->save();

        return response(['attendanceregister_id' => $attendanceregister->id, 'message' => 'attendanceregister reported']);


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
        $attendanceregister = AttendanceRegister::findOrFail($id);
        //$user->attendanceregister;
        return new AttendanceRegisterResource($attendanceregister);
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
        $attendanceregister=AttendanceRegister::where('id', $id)->update($request->all());
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
        $attendanceregister = AttendanceRegister::find($id);
        $attendanceregister->delete();
        return response(['attendanceregister' => $id, 'message' => 'attendanceregister successfully deleted']);
    }
}
