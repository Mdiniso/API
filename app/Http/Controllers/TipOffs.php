<?php

namespace App\Http\Controllers;

use App\Http\Resources\TipOff as TipOffResource;
use Illuminate\Http\Request;
use App\incident;
use App\TipOff;

class TipOffs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $incident_id = request()->segment(3);

        $tipoff = TipOff::where('incident_id', $incident_id)->get();
        return TipOffResource::collection($tipoff);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $cmemberID, $incidentID)
    {
        $tipoff = new TipOff;
        //return 

        /**$incidentID = request()->segment(3); //Getting data from the url
        $incident = Incident::findOrFail($incidentID);
        $cmemberID = $incident->$TipOff->$id;
         */
        $tipoff->incident_id = $incidentID;
        $tipoff->TipOff_id = $cmemberID;
        $tipoff->Description = $request->description;
        $tipoff->created_at = now();

        $tipoff->save();

        return response(['tipoff_id' => $tipoff->id, 'message' => 'tipoff reported']);
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
        $tipoff = TipOff::findOrFail($id);

        return new TipOffResource($tipoff);
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
        $tipoff = TipOff::where('id', $id)->update($request->all());
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
        $tipoff = TipOff::find($id);
        $tipoff->delete();
        return response(['TipOff' => $id, 'message' => 'tipoff successfully deleted']);
    }

    public function getAll()
    {

        $tipoff = TipOff::all();
        return TipOffResource::collection($tipoff);
    }
}
