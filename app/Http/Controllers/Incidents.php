<?php

namespace App\Http\Controllers;

use App\Http\Resources\incident as IncidentResource;
use Illuminate\Http\Request;
use App\incident;
use App\Events\IncidentEvent;

class Incidents extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $C_member_Id = request()->segment(3);

        $Incidents = incident::where('c_member_id', $C_member_Id)->get();
        return IncidentResource::collection($Incidents);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # code...
        /**$request->validate([
            
            "C_name"=> 'required',
            "C_surname"=> 'required',
            "C_username"=> 'required',
            "C_password"=> 'required',
            "C_address"=> 'required',
            "C_email"=> 'required',
            "C_phonenumbers"=> 'required',
            "C_dob"=> 'required',
            
        ]);*/

        //new Model object
        $incident = new incident;
        //return 

        //$incident = incident::findOrFail($id);//request()->segment(3); //Getting data from the url

        $incident->I_LocationLatitude = $request->i_locationlatitude;
        $incident->I_LocationLongitude = $request->i_locationlongitude;
        $incident->I_LevelofPrivacy = $request->i_levelofprivacy;
        $incident->I_AdditionalDetails = $request->i_additionaldetails;
        $incident->c_member_id = request()->segment(3); //$request->c_member_id;
        $incident->I_Type = $request->i_type;

        $incident->created_at = now();

        $incident->save();

        //function () {
        event(new IncidentEvent($incident));
        //};

        return response(['incident_id' => $incident->id, 'message' => 'incident reported']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //

        //$request = new Request();
        $id = $request->segment(5);
        $memberID = $request->segment(3);
        $incident = incident::findOrFail($id);
        //dd($incident);
        //$user->incident;
        if ($incident->c_member_id == $memberID) {
            return new IncidentResource($incident);
        }
        return  response(['Incident' => $id, 'message' => 'does not exist']);
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
        $incident = incident::where('id', $id)->update($request->all());
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

        $incident = incident::find($id);
        $incident->delete();
        return response(['Incident' => $id, 'message' => 'incident successfully deleted']);
    }


    public function getAll()
    {

        $incident = incident::all();
        return IncidentResource::collection($incident);
    }
}
