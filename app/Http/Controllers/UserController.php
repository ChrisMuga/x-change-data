<?php

namespace App\Http\Controllers;

#models
use App\user;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    #register
    public function register(Request $request)
    {
        #return $request;
        $user = new user;

        #id
        $id = rand(10,10000);
        $user->id = $id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email_address = $request->email_address;
        $user->password =  Hash::make($request->password);
        try
        {
            $user->save();
            #construct response
            $name = $request->first_name." ".$request->last_name;
            $msg =$name." (".$request->email_address.") has been registered successfully";
            $response = array("code"=>1,"msg"=>$msg);
            return $response;

        }
        catch(Exception $e)
        {
            $error_msg = $e->errorInfo[2];

            $msg = $error_msg;
            $response = array("code"=>0,"msg"=>$msg);
            return $response;

        }
        
       
    }
}
