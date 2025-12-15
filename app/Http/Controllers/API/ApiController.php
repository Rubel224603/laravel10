<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Runner\validate;

class ApiController extends Controller {

    public function goForLogin(Request $request){
       try{
           $request->validate([
               'email'=>"required|email",
               'password'=>'required'
           ]);
          $user = User::where('email', $request->email)->first();

            if (!$user) {
              return response()->json([
                  "success" => false,
                  "message" => "User not found"
              ], 404);
            }
            //if(!($request->password == $user->password)){
            //  return response()->json([
            //      "success"=>false,
            //        'message'=>"Credential Wrong!!!",
            //    ],401);
            //
            // }
           if ($request->password != $user->password) {
               return response()->json([
                   "success" => false,
                   'message' => "Credential Wrong!!!",
               ], 401);
           }
            return response()->json([
                "success"=>true,
                'message'=>"Login Success!!!",
            ],200);

       }catch(\Exception $e){
            return response()->json([
              "success"=>false,
              'message'=>"Something Went Wrong!!!".$e->getMessage(),
            ],500);
       }
    }
}
