<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Assistances as AssistanceResource;
use App\Assistance;

class Assistances extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $assistance = Assistance::all();
        return AssistanceResource::collection($assistance);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'incidentID' => ['required', 'string'],
            'cmemberID' => ['required', 'string'],
            'u_assistPoints' => ['required', 'string'],
        ]);
        $assistance = new Assistance;
        //return 

        /**$incidentID = request()->segment(3); //Getting data from the url
        $incident = Incident::findOrFail($incidentID);
        $cmemberID = $incident->$c_member->$id;
         */
        //$assistance->incident_id = $incidentID;
        //$assistance->c_member_id = $cmemberID;
        $assistance->incident_id = $request->incidentID;
        $assistance->c_member_id = $request->cmemberID;
        $assistance->U_assistPoints = $request->u_assistPoints;
        $assistance->created_at = now();

        $assistance->save();

        return response(['Assistance_id' => $assistance->id, 'message' => 'assistance Saved']);
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
        $assistance = Assistance::findOrFail($id);

        return new AssistanceResource($assistance);
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
        $assistance = Assistance::where('id', $id)->update($request->all());
        return response(['message' => 'Assistance updated']);
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
        $assistance = Assistance::find($id);
        $assistance->delete();
        return response(['assistance' => $id, 'message' => 'assistance successfully deleted']);
    }
}
