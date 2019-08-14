<?php

namespace App\Http\Controllers;

use App\Http\Resources\Patrol as PatrolResource;
use App\Patrol;
use Illuminate\Http\Request;

class Patrols extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patrol = Patrol::all();
        return PatrolResource::collection($patrol);
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
        $patrol = new Patrol;
        //return 

        /**$incidentID = request()->segment(3); //Getting data from the url
        $incident = Incident::findOrFail($incidentID);
        $cmemberID = $incident->$Patrol->$id;
        */
        $patrol->Patrol_area = $request->patrol_area;
        $patrol->Patrol_date = $request->patrol_date;        
        $patrol->created_at = now();

        $patrol->save();

        return response(['patrol_id' => $patrol->id, 'message' => 'patrol reported']);

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
        $patrol = Patrol::findOrFail($id);
        
        return new PatrolResource($patrol);
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
        $patrol=Patrol::where('id', $id)->update($request->all());
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
        $patrol = Patrol::find($id);
        $patrol->delete();
        return response(['patrol' => $id, 'message' => 'patrol successfully deleted']);
  
    }
}
