<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmergencyService;
use App\Http\Resources\EmergencyService as EmergencyServiceResource;


class EmergencyServices extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $EmergencyServices = EmergencyService::all();
        return EmergencyServiceResource::collection($EmergencyServices);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $EmergencyService = new EmergencyService;

        $EmergencyService->ES_name = $request->es_name;
        $EmergencyService->ES_contactnumbers = $request->es_contactnumbers;
        $EmergencyService->created_at = now();

        $EmergencyService->save();

        return response(['EmergencyService' => $EmergencyService->id, 'message' => 'EmergencyService details successfully saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $EmergencyService = EmergencyService::findOrFail($id);

        return new EmergencyServiceResource($EmergencyService);
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
        $EmergencyService = EmergencyService::where('id', $id)->update($request->all());

        return response(['message' => 'Emergency Service updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $EmergencyService = EmergencyService::find($id);
        $EmergencyService->delete();
        return response(['EmergencyService' => $EmergencyService->id, 'message' => 'EmergencyService details successfully deleted']);
    }
}
