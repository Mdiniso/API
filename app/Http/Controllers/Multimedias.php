<?php

namespace App\Http\Controllers;

use App\Http\Resources\Multimedia as MultimediaResource;
use Illuminate\Http\Request;
use App\incident;
use App\Multimedia;

class Multimedias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $multimedia = Multimedia::all();
        return MultimediaResource::collection($multimedia);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $incident_id, $multimediaID)
    {
         //new Model object
         $multimedia = new Multimedia;
         //return 
 
         //$incidentID = request()->segment(3); //Getting data from the url
        // $incidentID = request()->segment(4);
        //$incident = Incident::findOrFail($incidentID);
        //$multimediaID = $incident->Multimedia->id;
        
         $multimedia->M_name = $request->m_name;
         $multimedia->M_type = $request->m_type;
         $multimedia->M_size = $request->m_size;
         $multimedia->incident_id = $incident_id;
         $multimedia->Multimedia_id = $multimediaID;
         
         $multimedia->created_at = now();
 
         $multimedia->save();
 
         return response(['multimedia_id' => $multimedia->id, 'message' => 'multimedia saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $multimedia = Multimedia::findOrFail($id);
        
        return new MultimediaResource($multimedia);
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
        $multimedia=Multimedia::where('id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $multimedia = Multimedia::find($id);
        $multimedia->delete();
        return response(['multimedia' => $id, 'message' => 'multimedia successfully deleted']);
    }
}
