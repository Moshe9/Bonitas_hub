<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
use Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use App\Mail\BonitasMail;

class BrokerageController extends Controller
{
    public function AuthCheck()
    {
        $user_id = Session::get('id');
        if($user_id)
        {
            return;
        }else{
            return Redirect::to('/')->send();
        }
    }

    public function add_broker()
    {
        $this->AuthCheck();
        return view('brokerage.add_broker');
    } 

    public function save_broker(Request $request)
    {
        $date = now();
        $password = Str::random(8);
        $data_save = array();
        $data_save['firstname'] = $request->firstname;
        $data_save['lastname'] = $request->lastname;
        $data_save['brokercode'] = $request->brokercode;
        $data_save['email'] = $request->email;
        $data_save['phone'] = $request->phone;
        $data_save['role'] = $request->role;
        $data_save['password'] = md5($password);
        $data_save['created_at'] = $date;
        $data_save['updated_at'] = $date;

        DB::table('users')
            ->insert($data_save);

        $data = [
            'brokercode' => $request->brokercode,
            'password' => $password,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'role' => $request->role
        ];
        $email = $request->email;
        
         Mail::to($request->email)->send(new BonitasMail($data));
        // Mail::send('emails.SendMail',['email_data'=>$email_data] , function($message) use($email){
        //     $message->to($email, 'no-reply@bonitasmedicalfund.co.za')
        //             ->subject('New Account');
        // });
        return Redirect::to('/add-broker')->withSuccess('User successfully added!');
    }
    
    public function edit_broker($id){
        
        $this->AuthCheck();
        $user_info = [
            'userInfo' => DB::table('users')
                            ->where('id', $id)
                            ->get()
        ];

        return view('brokerage.edit_broker', $user_info);
    }

    public function update_broker(Request $request, $id)
    {
        $this->AuthCheck();
        $data = array();
        $data['brokercode'] = $request->brokercode;
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['role'] = $request->role;
        $data['updated_at'] = now();

        DB::table('users')
            ->where('id',$id)
            ->update($data);
        return Redirect::to('edit-broker/'. $id)->withSuccess('User details successfully updated!');

    }

    public function delete_broker($id){

        DB::table('users')
            ->where('id', $id)
            ->delete();
        return Redirect::to('/admin-dashboard')->withSuccess('User has been deleted successfully!');
    }

    public function brokerage_view(){

        $this->AuthCheck();
        $user_id = Session::get('id');
        $user_info = [
            'userInfo' => DB::table('users')
                            ->where('id',$user_id)
                            ->get()
        ];
        return view('brokerage.brokerage_view', $user_info);
    }

    public function broker_submitted()
    {
        $this->AuthCheck();
        return view('brokerage.view_submitted');
    }

    public function get_month(Request $request)
    {
        $month = $request->month;
        //$brokeragename = Session::get('brokeragename');
       

        $data = DB::table('tbl_advisors')
                    ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                    ->whereMonth('tbl_advisors.created_at',$month)
                    ->where('tbl_advisors.status',1)
                    //->where('tbl_advisors.brokeragename', $brokeragename)
                    ->get();
	       

        return response()->json([
            'data'=>$data]);  
    }
}
