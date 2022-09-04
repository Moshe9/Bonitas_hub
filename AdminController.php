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

class AdminController extends Controller
{
    public function admin_dashboard()
    {
        $this->AuthCheck();
        $admin_id = Session::get('id');
        $admin_info = [
            'adminInfo' => DB::table('users')
            		    ->join('login_count','users.id','=','login_count.user_id')
                            ->where('users.id',$admin_id)
                            ->get()
        ];
        return view('admin.dashboard', $admin_info);
    }

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

    public function view_user($id)
    {
        $this->AuthCheck();
        $user_info = [
            'userInfo' => DB::table('users')
                            ->where('id', $id)
                            ->get()
        ];

        return view('admin.view_user', $user_info);
    }
    public function edit_user($id)
    {
        $this->AuthCheck();
        $user_info = [
            'userInfo' => DB::table('users')
                            ->where('id', $id)
                            ->get()
        ];

        return view('admin.edit_user', $user_info);
    }

    public function update_user(Request $request, $id)
    {
        $this->AuthCheck();
        $data = array();
        $data['brokercode'] = $request->brokercode;
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['brokerhousename'] = $request->brokerhousename;
        $data['role'] = $request->role;
        $data['updated_at'] = now();

        DB::table('users')
            ->where('id',$id)
            ->update($data);
        return Redirect::to('/edit-user/'. $id)->withSuccess('User details successfully updated!');

    }

    public function update_pass(Request $pass, $id)
    {
        $new_password = md5($pass->password);
        DB::table('users')
            ->where('id',$id)
            ->update(['password'=>$new_password]);
        return Redirect::to('/edit-user/'. $id)->withSuccess('User password successfully updated!');
    }

    public function pdf_upload()
    {
        $this->AuthCheck();
        return view('admin.pdf_upload');
    }

    public function add_users()
    {
        $this->AuthCheck();
        return view('admin.add_users');
    }

    public function save_user(Request $request)
    {
        $date = now();
        $password = Str::random(8);
        $data_save = array();
        $data_save['firstname'] = $request->firstname;
        $data_save['lastname'] = $request->lastname;
        $data_save['brokercode'] = $request->brokercode;
        $data_save['email'] = $request->email;
        $data_save['phone'] = $request->phone;
        $data_save['brokerhousename'] = $request->brokerhousename;
        $data_save['role'] = $request->role;
        $data_save['password'] = md5($password);
        $data_save['created_at'] = $date;
        $data_save['updated_at'] = $date;

        DB::table('users')
            ->insert($data_save);

        $data = [
            'username' => $request->username,
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
        return Redirect::to('/add-users')->withSuccess('User successfully added!');
    }

    public function upload_pdf(Request $request)
    {
        $data = array();
        $data['file_name'] = $request->filename;
        $data['created_at'] = now();
        $file = $request->file('pdf_file');
        if($file)
        {
            $file_name = $file->getClientOriginalName();
            $ext = strtolower($file->getClientOriginalExtension());
            $file_full_name = $file_name;
            $upload_path = 'frontend/files/';
            $file_url = $upload_path.$file_full_name;
            $success = $file->move($upload_path,$file_full_name);
            if($success)
            {
                $data['file_path'] = $file_url;
                        DB::table('pdf_forms')
                            ->insert($data);
                return Redirect::to('/pdf-upload')->withSuccess('File successfully uploaded!');
            }

        }

    }

    public function view_pdf()
    {
        $this->AuthCheck();
        return view('admin.view_pdf');
    }

    public function marketing_upload()
    {
        $this->AuthCheck();
        return view('admin.marketing_uploads');
    }

    public function save_image(Request $request)
    {
        $data = array();
        $data['created_at'] = now();
        $image = $request->file('image');
        if($image)
        {
            $image_name = $image->getClientOriginalName();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name;
            $upload_path = 'frontend/images/marketing_elements/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success)
            {
                $data['image_path'] = $image_url;
                        DB::table('marketing_elements')
                            ->insert($data);
                return Redirect::to('/marketing-upload')->withSuccess('Image successfully uploaded!');
            }
        }
    }

    public function view_marketing_elements()
    {
        $this->AuthCheck();
        return view('admin.view_marketing_elements');
    }

    public function add_slider()
    {
        $this->AuthCheck();
        return view('admin.slider');
    }

    public function upload_slider(Request $request)
    {
        $data = array();
        $data['video_link'] = $request->videolink;
        $data['created_at'] = now();
        DB::table('sliders')->insert($data);
        return Redirect::to('/slider')->withSuccess('Slider item successfully uploaded');
    }

    public function view_sliders()
    {
        $this->AuthCheck();
        return view('admin.view_sliders');
    }

    public function delete_file($file_id)
    {
        DB::table('pdf_forms')
                ->where('file_id',$file_id)
                ->delete();
        return Redirect::to('/view-pdf')->withSuccess('File successfully deleted!');
    }

    public function delete_slider($slider_id)
    {
        DB::table('sliders')
                ->where('slider_id', $slider_id)
                ->delete();
        return Redirect::to('view-sliders')->withSuccess('Slider Item successfully deleted');
    }

    public function delete_marketing_element($image_id)
    {
        DB::table('marketing_elements')->where('image_id', $image_id)->delete();
        return Redirect::to('/view-marketing-elements')->withSuccess('Item successfully deleted!');
    }
}
