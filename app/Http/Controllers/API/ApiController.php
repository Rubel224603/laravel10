<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller {

    public function goForLogin(Request $request){
       try{
            $user = User::where('email', $request->emial)->first();
            if($user->password == !$request->password){
                return response()->json([
                  "success"=>false,
                  'message'=>"Credintial wrong!!!",
                ]);
                
            }
            return response()->json([
                "success"=>true,
                'message'=>"Login Success!!!",
            ]); 
       }catch(\Exception $e){
            return response()->json([
              "success"=>false,
              'message'=>"Something Went Wrong!!!".$e->getMessage(),
            ]);
       }
    }
}
