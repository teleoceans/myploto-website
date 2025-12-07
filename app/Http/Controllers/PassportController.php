<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Password;


class PassportController extends Controller

{



   public $successStatus = 200;



   /**

    * login api

    *

    * @return \Illuminate\Http\Response

    */

   public function login(){

       if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){

           $user = Auth::user();

           $success['token'] =  $user->createToken('MyApp')->accessToken;

           return response()->json(['success' => $success], $this->successStatus);

       }

       else{

           return response()->json(['error'=>'Unauthorised'], 401);

       }

   }



   /**

    * Register api

    *

    * @return \Illuminate\Http\Response

    */

   public function register(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'name' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required',
           'city' => 'required',
           'address' => 'required',
           'phone_number' => 'required|unique:users,phone_number',

       ]);


       if ($validator->fails()) {
          
           return response()->json(['error'=>$validator->errors()], 401);            

       }else{
          
             $input = $request->all();
       $input['password'] = bcrypt($input['password']);
       $user = User::create($input);
       $success['token'] =  $user->createToken('MyApp')->accessToken;
       $success['name'] =  $user->name;

       return response()->json(['success'=>$success], $this->successStatus);
       }

     
   }




   /**

    * Forget Password

    *

    * @return \Illuminate\Http\Response

    */


 public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Reset link sent to your email.'], 200)
            : response()->json(['message' => 'Unable to send reset link.'], 500);
    }
    
    
    
   /**

    * reset Password

    *

    * @return \Illuminate\Http\Response

    */
    
     public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed|min:8', // Add any password validation rules you need
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? response()->json(['message' => 'Password reset successfully.'], 200)
            : response()->json(['message' => 'Unable to reset the password.'], 500);
    }





   /**

    * details api

    *

    * @return \Illuminate\Http\Response

    */

   public function getDetails()
   {
       $user = Auth::user();
       return response()->json(['success' => $user], $this->successStatus);
   }
   
     public function deleteUser()
   {
       $user = auth()->user()->id;
       $user =  User::findOrfail($user);
       $user->delete();
       return response()->json(['success' => "Delete Success"], $this->successStatus);
   }
  

}
