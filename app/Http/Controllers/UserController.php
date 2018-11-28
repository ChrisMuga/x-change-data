<?php

namespace App\Http\Controllers;

#models
use App\user;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

    #signin
    public function signin()
    {
        return view('signin');
    }

    #user_signin
    public function user_signin(Request $request)
    {
        #return $request;
        $credentials = $request->only('email_address', 'password');

        if (Auth::attempt($credentials)) 
        {
            // Authentication passed...
            $user_data = Auth::user();
            $code=1;
            $msg="Welcome, ".$user_data->first_name;
            $response = array(

                'code'=>$code,
                'msg'=>$msg,
                'user_data'=>$user_data
            );
        }
        else
        {
            $code=0;
            $msg="Wrong Credentials";
            $response = array(

                'code'=>$code,
                'msg'=>$msg,
            );
        }

        return $response;
    }
}
