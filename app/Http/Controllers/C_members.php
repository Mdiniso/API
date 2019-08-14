<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\C_member;
use App\Http\Resources\C_member as C_memberResource;
use Illuminate\Support\Facades\Hash;
use App\incident;
use App\Http\Auth\RegisgerController;
use Illuminate\Auth\Events\Registered;


class C_members extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cmembers = C_member::all();
        return C_memberResource::collection($Cmembers);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
        //return dd($request->input("name"));
        /**$request->validate([
            
            "name"=> 'required',
            "surname"=> 'required',
            "password"=> 'required',
            "address"=> 'required',
            "email"=> 'required',
            "phonenumbers"=> 'required',
            "dob"=> 'required',
            "gender"=> 'required'
            
        ]);*/

        //$register = new RegisgerController();

        $Cmember = new C_member;
        //return 

        $Cmember->C_name = $request->name;
        $Cmember->C_surname = $request->surname;
        //$Cmember->C_username = $request->username;
        $Cmember->C_password = Hash::make($request->password);
        $Cmember->C_address = $request->address;
        $Cmember->C_email = $request->email;
        $Cmember->C_gender = $request->gender;
        $Cmember->C_phonenumbers = $request->phonenumbers;
        $Cmember->C_dob = $request->dob;
        //$Cmember->C_usertype = $request->usertype;
        $Cmember->C_picture = $request->picture;
        $Cmember->created_at = now();

        $Cmember->save();

        //$Cmember->update($request->all());

        return response(['C_memberID' => $Cmember->id, 'message' => 'C member successfully saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = C_member::findOrFail($id);
        $user->incident;
        return new C_memberResource($user);
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
        $Cmember = C_member::where('id', $id)->update($request->all());

        return response(['message' => 'Member updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Cmember = C_member::find($id);
        $Cmember->delete();
        return response(['C_memberID' => $id, 'message' => 'C member successfully deleted']);
    }
}
