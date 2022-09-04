<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
use Mail;
use App\Models\User;
use App\Mail\BonitasMail;
use App\Mail\OTPMail;
use App\Mail\ResetPass;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    // public function single_signon($request)  

    // { 

    //     //$emailRequest = $request->email;  

    //     $email = explode('=',$request)[1];  

    //     //echo($email);  

    //    $signIn = DB::table('users') ->where('email', $email)->first();  

    //    if($signIn) 

    //    { 

    //         $emailIn = $signIn->email; 

    //         $password = $signIn->password; 

    // //Force Login 

    //         $login = DB::table('users') 

    //                 ->where('email', $emailIn) 

    //                 ->where('password', $password) 

    //                 ->first(); 

    //         //dd($login); 

    //         if($login) 

    //         { 

    //             $role = $login->role; 

 
 

    //             if($role == 0) 

    //             { 

    //                 //session_start(); 

    //                 Session::put('id', $login->id); 

    //                 Session::put('brokeragename', $login->brokerhousename);  

 
 

    //                 Session::put('role', $login->role);  

             

    //                 Session::put('username', $login->firstname . " " . $login->lastname); 

    //                 $user = Session::get('username'); 

    //                 return Redirect::to('/dashboard')->withSuccess("Hi ".$user." Welcome to the Bonitas Business Hub!"); 

    //             } 

    //             elseif($role == 1 || $role == 2 || $role == 3){ 

    //                 Session::put('id', $login->id); 

    //                 Session::put('brokeragename', $login->brokerhousename);  

 
 

    //                 Session::put('role', $login->role);  

             

    //                 Session::put('username', $login->firstname . " " . $login->lastname); 

    //                 $user = Session::get('username'); 

    //                 return Redirect::to('/admin-dashboard')->withSuccess("Hi ".$user.", Welcome to the Bonitas Business Hub!"); 

    //             } 

    //         }else{ 

    //             echo "Unauthorised login"; 

    //         } 

    //    }else{ 

    //        return Redirect::to('/')->withFail('Oh No!, We cannot authorize this login. This happens normally when the email is wrong from the DOSS System'); 

    //    } 

    // } 

    public function login(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        $login = DB::table('users')
                    ->where('email', $email)
                    ->where('password', $password)
                    ->first();

        //logic for login

        if($login)
        {
            if($login->role == 1 || $login->role == 2)
            {
                Session::put('id', $login->id);
                Session::put('brokeragename', $login->brokerhousename);
                Session::put('role', $login->role);
                Session::put('username', $login->firstname . " " . $login->lastname);

                $user_id = Session::get('id');
                $idcheck = DB::table('login_count')
                                ->where('user_id', $user_id)
                                ->first();

                if(empty($idcheck))
                {
                    $count = 0;
                    DB::table('login_count')
                        ->insert(['user_id' => $user_id]);

                    $counter = DB::table('login_count')
                            ->select('count')
                            ->where('user_id', $user_id)
                            ->first();
                    $count ++;

                    DB::table('login_count')
                        ->where('user_id', $user_id)
                        ->update(['count'=> $count]);

                }else if($login->role == 3){
                    Session::put('id', $login->id);
                    Session::put('brokercode', $login->brokercode);
                    Session::put('brokeragename', $login->brokerhousename);
                    Session::put('username', $login->firstname . " " . $login->lastname);
                    Session::put('role', $login->role);

                    return Redirect::to('/dashboard');
                }
                else{
                    $count = $idcheck->count;
                    $counter = DB::table('login_count')
                            ->where('user_id', $user_id)
                            ->first();
                    $count ++;

                    DB::table('login_count')
                        ->select('count')
                        ->where('user_id', $user_id)
                        ->update(['count'=> $count]);
                }
                return Redirect::to('/admin-dashboard');
            }else if($login->role == 0){
                Session::put('id', $login->id);
                Session::put('brokercode', $login->brokercode);
                Session::put('brokeragename', $login->brokerhousename);
                Session::put('username', $login->firstname);
                $user_id = $login->id;
                $code = rand(1,9999);
                $data = array();
                $data['user_id'] = $user_id;
                $data['code'] = $code;
                $data['username'] = $login->firstname;
                DB::table('user_codes')
                        ->insert($data);

                //login count update
                $user_id = Session::get('id');
                $idcheck = DB::table('login_count')
                                ->where('user_id', $user_id)
                                ->first();

                if(empty($idcheck))
                {
                    $count = 0;
                    DB::table('login_count')
                        ->insert(['user_id' => $user_id]);

                    $counter = DB::table('login_count')
                            ->select('count')
                            ->where('user_id', $user_id)
                            ->first();
                    $count ++;

                    DB::table('login_count')
                        ->where('user_id', $user_id)
                        ->update(['count'=> $count]);

                }else{
                    $count = $idcheck->count;
                    $counter = DB::table('login_count')
                            ->where('user_id', $user_id)
                            ->first();
                    $count ++;

                    DB::table('login_count')
                        ->select('count')
                        ->where('user_id', $user_id)
                        ->update(['count'=> $count]);
                }
                
               // Mail::to($login->email)->send(new OTPMail($data));
                
                //Send SMS
                
                //Send SMS ends
                
                return Redirect::to('/dashboard');
            }
        }else{
            return Redirect::to('/')->withFail(" Oops! Invalid user name or password entered! Try  again you've got this.");
        }

        //OTP logic
        // if($login)
        // {
        //     $user_id = $login->id;
        //     $code = rand(1,9999);
        //     $data = array();
        //     $data['user_id'] = $user_id;
        //     $data['code'] = $code;
        //     DB::table('user_codes')
        //             ->insert($data);
        //     Mail::to($login->email)->send(new BonitasMail($data));
        //     return view('emails.sendMail');
        //     // return Redirect::to('/otp-verify')->withSuccess("We've sent an email to " . $login->email . " With  the OTP to aunticate your account! ". $code);
        // }else{
        //     return Redirect::to('/')->withFail("Oops! Invalid user name or password entered! Try  again you've got this.");
        // }
    }
    public function forgot_password()
    {
        return view('forgot_pass');
    }

    public function otp_verify()
    {
        return view('otp_verify');
    }

    public function verify_otp(Request $request){
        $otp = $request->otp;
        $userId = Session::get('id');
        $verify = DB::table('user_codes')
                    ->where('user_id',$userId)
                    ->where('code',$otp)
                    ->first();
        if($verify){
            if($verify->used == 0){
                DB::table('user_codes')
                    ->where('user_id',$userId)
                    ->where('code',$otp)
                    ->update(['used'=>1]);
                return Redirect::to('/dashboard');
            }else{
                return Redirect::to('/otp-verify')->withFail(" Oops! You cannot use this OTP as it already worked before");
            }
        }else{
            return Redirect::to('/otp-verify')->withFail(" Oops! Invalid OTP entered! Try  again you've got this.");
        }
    }

    public function reset_password(Request $request)
    {
        $email = $request->email;
        $username = DB::table('users')
                    ->where('email',$email)
                    ->first();
        if($username){
            $token = Str::random(64);
            $data = array();
            $insert = array();
            $insert['email'] = $email;
            $insert['token'] = $token;
            $insert['created_at'] = now();
            $data['token'] = $token;
            $data['email'] = $email;
            $data['username'] = $username->firstname;

            DB::table('password_resets')
                ->insert($insert);
            Mail::to($username->email)->send(new ResetPass($data));
            return Redirect::to('/forgot-pass')->withSuccess(" We've mailed you the forgot password reset link!");
        }else{
            return Redirect::to('/forgot-pass')->withFail(" Oops! That email does not match any of our records! ");
        }
        

    }

    public function change_pass($token)
    {
        return view('change_pass', ['token' => $token]);
    }

    public function new_pass(Request $request)
    {
        $token = $request->token;
        $email = $request->email;
        $password = $request->password;
        $cpassword = $request->cpassword;

        $updatePass = DB::table('password_resets')
                        ->where('email', $email)
                        ->where('token', $token)
                        ->first();
        if(!$updatePass)
        {
            return back()->withFail(" Oops! That token or email seem to be invalid");
        }else{
            if($password == $cpassword)
            {
                DB::table('users')
                    ->where('email',$email)
                    ->update(['password'=>md5($password)]);
                return Redirect::to('/')->withSuccess(" Your Password has been successfully changed!");
            }else{
                return back()->withFail(" Oops! Those passwords do not match!");
            }
        }
    }

    public function logout()
    {
        $user_id = Session::get('id');
        DB::table('users')
            ->where('id', $user_id);
        Session::flush();
        // Auth::logout();
        return Redirect::to('/');
    }

    public function single_signon($request) 
    { 
		return Redirect::to('/');

    } 

}
