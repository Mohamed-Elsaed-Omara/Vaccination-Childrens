<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Parrent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class AuthTokensLoginController extends Controller
{

    public function login(Request $request){
        
        $request->validate([
            'national_id' => 'required',
            'password' => 'required',
            'device_name' => 'string'
        ]);

        $parent = Parrent::where('national_id' , $request->national_id)->first();

        if(! $parent || ! Hash::check($request->password , $parent->password)){
            
            return Response::json([
                'msg' => 'The provided credentials are incorrect.',
            ],401) ;
        }

        $device_name = $request->post('device_name', $request->userAgent());
        $token = $parent->createToken($device_name)->plainTextToken;

        return Response::json([
            'msg' => 'authentication successfully',
            'token' => $token,
            'parent' => [
                'id' => $parent->id,
                'name' => $parent->name,
                'national_id' => $parent->national_id,
                'phone_number' => $parent->phone_number,
                'address' => $parent->address
            ]
        ],200) ;

        
    }

    public function changePassword(Request $request)
    {
        // Validate the request data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Get the authenticated user
        $parent = $request->user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $parent->password)) {
            return Response::json([
                'msg' => 'Current password is incorrect.',
            ], 401);
        }

        // Update the password
        $parent->password = Hash::make($request->new_password);
        $parent->save();

        return Response::json([
            'msg' => 'Password changed successfully.',
        ], 200);
    }

    public function logout(Request $request){

        //logot From current device

        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
