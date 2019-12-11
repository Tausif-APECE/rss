<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EmailcheckingController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Email Checking Controller
    |--------------------------------------------------------------------------
    |
    | This controller checks duplication of email address for the new user.
    | For exsiting email address disable register button and alert user.
    |
    */


    /**
     * Check unique email request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function checkEmail(Request $request)
    {
        $row = User::where('email',$request->email)->first();
        if($row){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }
}
