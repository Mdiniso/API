<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\C_member;
use App\Http\Resources\C_member as C_memberResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phonenumbers' => ['required', 'string', 'min:10'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $isExist = C_member::where('C_email', $request->email)->orWhere('C_phonenumbers', $request->phonenumbers)->first();

        if (!$isExist) {
            $Cmember = new  C_member();

            $Cmember->C_name = $request->name;
            $Cmember->C_surname = $request->surname;
            $Cmember->C_password = Hash::make($request->password);
            $Cmember->C_address = $request->address;
            $Cmember->C_email = $request->email;
            $Cmember->C_gender = $request->gender;
            $Cmember->C_phonenumbers = $request->phonenumbers;
            $Cmember->C_dob = $request->dob;
            $Cmember->C_picture = $request->picture;
            $Cmember->created_at = now();

            $Cmember->save();

            $response = new Response();
            return $response->setStatusCode(200, 'Member successfully registered!');
            //return response(['C_memberID' => $Cmember->id, 'message' => 'C member successfully saved']);
        } else {
            return response((['status' => 'error', 'message' => 'Email or phone number already exists']));
        }
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $Cmember = C_member::where('C_email', $request->email)->first();

        if (!$Cmember) {
            return response(['message' => 'User not found']);
        }

        if (Hash::check($request->password, $Cmember->C_password)) {
            return response(['C_memberID' => $Cmember->id, 'message' => 'true']);
        }
    }
}
