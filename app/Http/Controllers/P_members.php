<?php

namespace App\Http\Controllers;

use App\Http\Resources\P_member as P_memberResource;
use Illuminate\Http\Request;
use App\P_member;

class P_members extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $p_member = P_member::all();
        return P_memberResource::collection($p_member);
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
        $p_member = new P_member;
        //return 

        /**$incidentID = request()->segment(3); //Getting data from the url
        $incident = Incident::findOrFail($incidentID);
        $cmemberID = $incident->$P_member->$id;
         */
        $p_member->Patrol_id = $request->patrolID;
        $p_member->c_member_id = request()->segment(3);
        //$p_member->U_assistPoints = $request->u_assistPoints;        
        $p_member->created_at = now();

        $p_member->save();

        return response(['p_member_id' => $p_member->id, 'message' => 'p_member saved']);
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
        $p_member = P_member::findOrFail($id);

        return new P_memberResource($p_member);
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
        $p_member = P_member::where('id', $id)->update($request->all());
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
        $p_member = P_member::find($id);
        $p_member->delete();
        return response(['P_member' => $id, 'message' => 'p_member successfully deleted']);
    }
}
