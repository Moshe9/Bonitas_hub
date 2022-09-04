<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Response;
session_start();
use Mail;
use Illuminate\Support\Facades\Redirect;
use App\Mail\MailMember;
use App\Mail\DepsMemberMail;
use App\Mail\NoMedSchemeMail;
use App\Mail\NoMedQsMail;
use App\Mail\NoGpNoms;
use App\Mail\AlldataMail;
use PDF;

class HubController extends Controller
{
    //Delete Functions start here
    public function delete_additional($user_id) 
    { 
        $db_update = DB::table('tbl_advisors') 
                            ->where('user_id', $user_id)->update(['status'=>2]); 
        return Redirect::to('/hub-home')->withSuccess("Record deleted successfully"); 
    }

    public function delete_pending($user_id) 
    { 
        $db_update = DB::table('tbl_advisors') 
                            ->where('user_id', $user_id)->update(['status'=>2]); 
        return Redirect::to('/hub-home')->withSuccess("Record deleted successfully"); 
    }
    public function fed_delete_additional($user_id) 
    { 
        $db_update = DB::table('fed_tbl_advisors') 
                            ->where('user_id', $user_id)->update(['status'=>2]); 
        return Redirect::to('/hub-fedhome')->withSuccess("Record deleted successfully"); 
    }

    public function fed_delete_pending($user_id) 
    { 
        $db_update = DB::table('fed_tbl_advisors') 
                            ->where('user_id', $user_id)->update(['status'=>2]); 
        return Redirect::to('/hub-fedhome')->withSuccess("Record deleted successfully"); 
    }
    public function grp_delete_pending($user_id) 
    { 
        $db_update = DB::table('grp_advisors') 
                            ->where('user_id', $user_id)->update(['status'=>2]); 
        return Redirect::to('/group-home')->withSuccess("Record deleted successfully"); 
    }

    public function grp_delete_additional($id) 
    { 
        $db_update = DB::table('grp_advisors') 
                            ->where('user_id', $user_id)->update(['status'=>2]); 
        return Redirect::to('/group-home')->withSuccess("Record deleted successfully"); 

    }
    //Delete Functions end here
    public function dashboard()
    {
        $this->AuthCheck();
        $user_id = Session::get('id');
        $user_info = [
            'userInfo' => DB::table('users')
                            ->where('id',$user_id)
                            ->get()
        ];
        return view('hub.dashboard', $user_info);
    }
    public function hub_home()
    {
        $this->AuthCheck();
        $user_id = Session::get('id');
        $user_info = [
            'userInfo' => DB::table('users')
                            ->where('id',$user_id)
                            ->get()
        ];
        return view('hub.home', $user_info);
    }
    public function hub_fedhome()
    {
        $this->AuthCheck();
        $user_id = Session::get('id');
        $user_info = [
            'userInfo' => DB::table('users')
                            ->where('id',$user_id)
                            ->get()
        ];
        return view('hub.fedhome', $user_info);
    }
    public function group_home()
    {
        $this->AuthCheck();
        $user_id = Session::get('id');
        $user_info = [
            'userInfo' => DB::table('users')
                            ->where('id',$user_id)
                            ->get()
        ];
        return view('hub.group_home', $user_info);
        
    }
    public function fedDashboard()
    {
        $this->AuthCheck();
        $user_id = Session::get('id');
        $user_info = [
            'userInfo' => DB::table('users')
                            ->where('id',$user_id)
                            ->get()
        ];
        return view('hub.fedDashboard', $user_info);
        
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

    public function marketing_elements()
    {
        $this->AuthCheck();

        return view('hub.marketing_elements');
    }

    public function query()
    {
        $this->AuthCheck();

        return view('hub.query');
    }
    public function account($id)
    {
        $this->AuthCheck();
        $my_details = [
            'details' => DB::table('users')
                            ->where('id',$id)
                            ->get()
        ];
        return view('hub.account',$my_details);
    }

    public function edit_account(Request $request, $id)
    {
        $data = array();
        $data['brokercode'] = $request->brokercode;
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['updated_at'] = now();

        DB::table('users')
            ->where('id', $id)
            ->update($data);

        return Redirect::to('/my-account/'.$id)->withSuccess('Your account details have been successfully updated!');
    }

    public function change_password(Request $request, $id)
    {
        $old_password = md5($request->old_password);
        $pass_check = DB::table('users')
                        ->where('password',$old_password)
                        ->first();
        if($pass_check)
        {
            $new_password = $request->new_password;
            $confirm_pass = $request->confirm_password;
            if($new_password == $confirm_pass)
            {
                $password = md5($new_password);
                DB::table('users')
                    ->where('id',$id)
                    ->update(['password'=> $password]);
                return Redirect::to('/my-account/' .$id)->withSuccess('Your Password has been successfully changed!');
            }else{
                return Redirect::to('/my-account/' .$id)->withFail("Oops! Those passwords did'nt match! Please try again");
            }
        }else{
            return Redirect::to('/my-account/' .$id)->withFail("Oops! Your old password is invalid.");
        }

        $image = $request->file('image');
        if($image)
        {
            $image_name = $image->getClientOriginalName();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name;
            $upload_path = 'frontend/images/uploads/user/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success)
            {
                $data['image'] = $image_url;
                        DB::table('users')
                            ->where('id',$id)
                            ->update($data);
                return Redirect::to('/my-account/' .$id)->withSuccess('Avatar successfully uploaded!');
            }
        }

    }

    public function view_submitted($member_id)
    {
        $approved = [
            'approvedApps' => DB::table('tbl_advisors')
                            ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                            ->where('tbl_advisors.user_id',$member_id)
                            ->get()
        ];

        return view('hub.detailed_view', $approved);
    }
    
    public function view_submitted_group($member_id)
    {
        $approved = [
            'approvedApps' => DB::table('grp_advisors')
                            ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                            ->where('grp_advisors.user_id',$member_id)
                            ->get()
        ];

        return view('hub.detailed_view_group', $approved);
    }

    public function email_copy($member_id)
    {
        //start of ifs
        $depsUserId = DB::table('tbl_dependents')
                            // ->find('user_id')
                            ->where('user_id',$member_id)
                            ->first();

        // dd($depsUserId);

        $medscUserId = DB::table('tbl_medical_scheme')
                            ->select('user_id')
                            ->where('user_id',$member_id)
                            ->first();
        
        $medqUserId = DB::table('tbl_medical_questions')
                            ->select('user_id')
                            ->where('user_id',$member_id)
                            ->first();
        
        $gpnomUserId = DB::table('tbl_gpnominations')
                            ->select('user_id')
                            ->where('user_id',$member_id)
                            ->first();

        
        if(!empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId))
        {
            $member_data = DB::table('tbl_advisors')
                        ->join('tbl_members','tbl_advisors.user_id', '=','tbl_members.user_id')
                        ->join('tbl_members_contacts','tbl_advisors.user_id', '=','tbl_members_contacts.user_id')
                        ->join('tbl_dependents','tbl_advisors.user_id', '=', 'tbl_dependents.user_id')
                        ->join('tbl_banks_contributions','tbl_advisors.user_id', '=', 'tbl_banks_contributions.user_id')
                        ->join('tbl_banks_refunds','tbl_advisors.user_id', '=', 'tbl_banks_refunds.user_id')
                        ->join('tbl_medical_scheme','tbl_advisors.user_id', '=', 'tbl_medical_scheme.user_id')
                        ->join('tbl_medical_questions','tbl_advisors.user_id', '=', 'tbl_medical_questions.user_id')
                        ->join('tbl_gpnominations','tbl_advisors.user_id', '=', 'tbl_gpnominations.user_id')
                        // ->select('tbl_advisors.*','tbl_members.*')
                        ->where('tbl_advisors.user_id',$member_id)
                        ->first();
        
            $data = [
                'mainid_number' => $member_data->mainid_number,
                'main_title' => $member_data->main_title,
                'main_surname' => $member_data->main_surname,
                'main_firstname' => $member_data->main_firstname,
                'main_initial' => $member_data->main_initial,
                'main_marital' => $member_data->main_marital,
                'mgender_radio' => $member_data->mgender_radio,
                'm_dob' => $member_data->m_dob,
                'main_lang' => $member_data->main_lang,
                'm_race' => $member_data->m_race,
                'm_deps_radio' => $member_data->m_deps_radio,
                'capturedby' => $member_data->capturedby,
                'created_at' => $member_data->created_at,
                'm_cell' => $member_data->m_cell,
                'm_telh' => $member_data->m_telh,
                'm_telw' => $member_data->m_telw,
                'mtax' => $member_data->mtax,
                'm_email' => $member_data->m_email,
                'mainid_pobox' => $member_data->mainid_pobox,
                'm_psnum' => $member_data->m_psnum,
                'm_psname' => $member_data->m_psname,
                'm_pstype' => $member_data->m_pstype,
                'm_psuburb' => $member_data->m_psuburb,
                'm_postalcode' => $member_data->m_postalcode,
                'm_ssnum' => $member_data->m_ssnum,
                'm_ssname' => $member_data->m_ssname,
                'm_sstype' => $member_data->m_sstype,
                'm_ssuburb' => $member_data->m_ssuburb,
                'm_spostalcode' => $member_data->m_spostalcode,

                'dep_title' => $member_data->dep_title,
                'd_idpass' => $member_data->d_idpass,
                'd_firstname' => $member_data->d_firstname,
                'd_surname' => $member_data->d_surname,
                'd_dob' => $member_data->d_dob,
                'd_marital' => $member_data->d_marital,
                'd_race' => $member_data->d_race,
                'm_psname' => $member_data->m_psname,
                'd_gender_radio' => $member_data->d_gender_radio,
                'd_rel' => $member_data->d_rel,
                'd_contact' => $member_data->d_contact,
                'd_tax' => $member_data->d_tax,

                'thirdpartycheck' => $member_data->thirdpartycheck,
                'bankname' => $member_data->bankname,
                'accholderid' => $member_data->accholderid,
                'accholder' => $member_data->accholder,
                'accholdersurname' => $member_data->accholdersurname,
                'accnum' => $member_data->accnum,
                'acctype' => $member_data->acctype,
                'debitdate' => $member_data->debitdate,
                'branchcode' => $member_data->branchcode,
                'branchname' => $member_data->branchname,
                'verification' => $member_data->verification,
                'idvalidation' => $member_data->idvalidation,
                'consentupload' => $member_data->consentupload,

                'thirdpartycheck' => $member_data->thirdpartycheck,
                'sameacccheck' => $member_data->sameacccheck,
                'bankname' => $member_data->bankname,
                'accholderid' => $member_data->accholderid,
                'accholder' => $member_data->accholder,
                'accholdersurname' => $member_data->accholdersurname,
                'accnum' => $member_data->accnum,
                'acctype' => $member_data->acctype,
                'debitdate' => $member_data->debitdate,
                'branchcode' => $member_data->branchcode,
                'branchname' => $member_data->branchname,

                'fullname' => $member_data->fullname,
                'medscheme' => $member_data->medscheme,
                'membership_num' => $member_data->membership_num,
                'accholdersurname' => $member_data->accholdersurname,
                'medjoindate' => $member_data->medjoindate,
                'medenddate' => $member_data->medenddate,
                'comupload' => $member_data->comupload,

                'medical_questions' => $member_data->medical_questions,
                'fullname' => $member_data->fullname,
                'illness' => $member_data->illness,
                'treated' => $member_data->treated,
                'firsttreatmentdate' => $member_data->firsttreatmentdate,
                'lasttreatmentdate' => $member_data->lasttreatmentdate,
                'gpfullname' => $member_data->gpfullname,

                
                'fullname' => $member_data->fullname,
                'firstdocname' => $member_data->firstdocname,
                'firstdocpnum' => $member_data->firstdocpnum,
                'seconddocname' => $member_data->seconddocname,
                'seconddocpnum' => $member_data->seconddocpnum,
                'capturedby' => $member_data->capturedby,
                'medstart_date' => $member_data->medstart_date,
                'brokercode' => $member_data->brokercode,
                'brokeremail' => $member_data->brokeremail,
                'brokeragename' => $member_data->brokeragename,
                'terms_agreement' => $member_data->terms_agreement,
                'advisor_dates' => $member_data->advisor_dates,
                'advisor_memfullname' => $member_data->advisor_memfullname,
                'mem_declaration' => $member_data->mem_declaration,
                'membership_num' => $member_data->membership_num,
                'reference_id' => $member_data->reference_id,
                    
            ];

            if($member_data->m_email !='')
            {
                Mail::to($member_data->m_email)->send(new AlldataMail($data));
                return Redirect::to('/view-submitted/'.$member_id)->withSuccess('Copy of the Application Successfully sent to member');
            }else{
                return Redirect::to('/view-submitted/'.$member_id)->withFail("There's an issue with the member email! Either invalid or not found");
            }

        }elseif(empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId)){
            $member_data = DB::table('tbl_advisors')
                        ->join('tbl_members','tbl_advisors.user_id', '=','tbl_members.user_id')
                        ->join('tbl_members_contacts','tbl_advisors.user_id', '=','tbl_members_contacts.user_id')
                        //->join('tbl_dependents','tbl_advisors.user_id', '=', 'tbl_dependents.user_id')
                        ->join('tbl_banks_contributions','tbl_advisors.user_id', '=', 'tbl_banks_contributions.user_id')
                        ->join('tbl_banks_refunds','tbl_advisors.user_id', '=', 'tbl_banks_refunds.user_id')
                        ->join('tbl_medical_scheme','tbl_advisors.user_id', '=', 'tbl_medical_scheme.user_id')
                        ->join('tbl_medical_questions','tbl_advisors.user_id', '=', 'tbl_medical_questions.user_id')
                        ->join('tbl_gpnominations','tbl_advisors.user_id', '=', 'tbl_gpnominations.user_id')
                        // ->select('tbl_advisors.*','tbl_members.*')
                        ->where('tbl_advisors.user_id',$member_id)
                        ->first();
            $data = [
                'mainid_number' => $member_data->mainid_number,
                'main_title' => $member_data->main_title,
                'main_surname' => $member_data->main_surname,
                'main_firstname' => $member_data->main_firstname,
                'main_initial' => $member_data->main_initial,
                'main_marital' => $member_data->main_marital,
                'mgender_radio' => $member_data->mgender_radio,
                'm_dob' => $member_data->m_dob,
                'main_lang' => $member_data->main_lang,
                'm_race' => $member_data->m_race,
                'm_deps_radio' => $member_data->m_deps_radio,
                'capturedby' => $member_data->capturedby,
                'created_at' => $member_data->created_at,
                'm_cell' => $member_data->m_cell,
                'm_telh' => $member_data->m_telh,
                'm_telw' => $member_data->m_telw,
                'mtax' => $member_data->mtax,
                'm_email' => $member_data->m_email,
                'mainid_pobox' => $member_data->mainid_pobox,
                'm_psnum' => $member_data->m_psnum,
                'm_psname' => $member_data->m_psname,
                'm_pstype' => $member_data->m_pstype,
                'm_psuburb' => $member_data->m_psuburb,
                'm_postalcode' => $member_data->m_postalcode,
                'm_ssnum' => $member_data->m_ssnum,
                'm_ssname' => $member_data->m_ssname,
                'm_sstype' => $member_data->m_sstype,
                'm_ssuburb' => $member_data->m_ssuburb,
                'm_spostalcode' => $member_data->m_spostalcode,

                'thirdpartycheck' => $member_data->thirdpartycheck,
                'bankname' => $member_data->bankname,
                'accholderid' => $member_data->accholderid,
                'accholder' => $member_data->accholder,
                'accholdersurname' => $member_data->accholdersurname,
                'accnum' => $member_data->accnum,
                'acctype' => $member_data->acctype,
                'debitdate' => $member_data->debitdate,
                'branchcode' => $member_data->branchcode,
                'branchname' => $member_data->branchname,
                'verification' => $member_data->verification,
                'idvalidation' => $member_data->idvalidation,
                'consentupload' => $member_data->consentupload,

                'thirdpartycheck' => $member_data->thirdpartycheck,
                'sameacccheck' => $member_data->sameacccheck,
                'bankname' => $member_data->bankname,
                'accholderid' => $member_data->accholderid,
                'accholder' => $member_data->accholder,
                'accholdersurname' => $member_data->accholdersurname,
                'accnum' => $member_data->accnum,
                'acctype' => $member_data->acctype,
                'debitdate' => $member_data->debitdate,
                'branchcode' => $member_data->branchcode,
                'branchname' => $member_data->branchname,

                'fullname' => $member_data->fullname,
                'medscheme' => $member_data->medscheme,
                'membership_num' => $member_data->membership_num,
                'accholdersurname' => $member_data->accholdersurname,
                'medjoindate' => $member_data->medjoindate,
                'medenddate' => $member_data->medenddate,
                'comupload' => $member_data->comupload,

                'medical_questions' => $member_data->medical_questions,
                'fullname' => $member_data->fullname,
                'illness' => $member_data->illness,
                'treated' => $member_data->treated,
                'firsttreatmentdate' => $member_data->firsttreatmentdate,
                'lasttreatmentdate' => $member_data->lasttreatmentdate,
                'gpfullname' => $member_data->gpfullname,

                'fullname' => $member_data->fullname,
                'firstdocname' => $member_data->firstdocname,
                'firstdocpnum' => $member_data->firstdocpnum,
                'seconddocname' => $member_data->seconddocname,
                'seconddocpnum' => $member_data->seconddocpnum,
                'capturedby' => $member_data->capturedby,
                'medstart_date' => $member_data->medstart_date,
                'brokercode' => $member_data->brokercode,
                'brokeremail' => $member_data->brokeremail,
                'brokeragename' => $member_data->brokeragename,
                'terms_agreement' => $member_data->terms_agreement,
                'advisor_dates' => $member_data->advisor_dates,
                'advisor_memfullname' => $member_data->advisor_memfullname,
                'mem_declaration' => $member_data->mem_declaration,
                'membership_num' => $member_data->membership_num,
                'reference_id' => $member_data->reference_id,
                    
            ];

            if($member_data->m_email !='')
            {
                Mail::to($member_data->m_email)->send(new DepsMemberMail($data));
                return Redirect::to('/view-submitted/'.$member_id)->withSuccess('Copy of the Application Successfully sent to member');
            }else{
                return Redirect::to('/view-submitted/'.$member_id)->withFail("There's an issue with the member email! Either invalid or not found");
            }
            
        }elseif(!empty($depsUserId) && empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId)){
            $member_data = DB::table('tbl_advisors')
                        ->join('tbl_members','tbl_advisors.user_id', '=','tbl_members.user_id')
                        ->join('tbl_members_contacts','tbl_advisors.user_id', '=','tbl_members_contacts.user_id')
                        ->join('tbl_dependents','tbl_advisors.user_id', '=', 'tbl_dependents.user_id')
                        ->join('tbl_banks_contributions','tbl_advisors.user_id', '=', 'tbl_banks_contributions.user_id')
                        ->join('tbl_banks_refunds','tbl_advisors.user_id', '=', 'tbl_banks_refunds.user_id')
                        //->join('tbl_medical_scheme','tbl_advisors.user_id', '=', 'tbl_medical_scheme.user_id')
                        ->join('tbl_medical_questions','tbl_advisors.user_id', '=', 'tbl_medical_questions.user_id')
                        ->join('tbl_gpnominations','tbl_advisors.user_id', '=', 'tbl_gpnominations.user_id')
                        // ->select('tbl_advisors.*','tbl_members.*')
                        ->where('tbl_advisors.user_id',$member_id)
                        ->first();
            $data = [
                'mainid_number' => $member_data->mainid_number,
                'main_title' => $member_data->main_title,
                'main_surname' => $member_data->main_surname,
                'main_firstname' => $member_data->main_firstname,
                'main_initial' => $member_data->main_initial,
                'main_marital' => $member_data->main_marital,
                'mgender_radio' => $member_data->mgender_radio,
                'm_dob' => $member_data->m_dob,
                'main_lang' => $member_data->main_lang,
                'm_race' => $member_data->m_race,
                'm_deps_radio' => $member_data->m_deps_radio,
                'capturedby' => $member_data->capturedby,
                'created_at' => $member_data->created_at,
                'm_cell' => $member_data->m_cell,
                'm_telh' => $member_data->m_telh,
                'm_telw' => $member_data->m_telw,
                'mtax' => $member_data->mtax,
                'm_email' => $member_data->m_email,
                'mainid_pobox' => $member_data->mainid_pobox,
                'm_psnum' => $member_data->m_psnum,
                'm_psname' => $member_data->m_psname,
                'm_pstype' => $member_data->m_pstype,
                'm_psuburb' => $member_data->m_psuburb,
                'm_postalcode' => $member_data->m_postalcode,
                'm_ssnum' => $member_data->m_ssnum,
                'm_ssname' => $member_data->m_ssname,
                'm_sstype' => $member_data->m_sstype,
                'm_ssuburb' => $member_data->m_ssuburb,
                'm_spostalcode' => $member_data->m_spostalcode,

                'dep_title' => $member_data->dep_title,
                'd_idpass' => $member_data->d_idpass,
                'd_firstname' => $member_data->d_firstname,
                'd_surname' => $member_data->d_surname,
                'd_dob' => $member_data->d_dob,
                'd_marital' => $member_data->d_marital,
                'd_race' => $member_data->d_race,
                'm_psname' => $member_data->m_psname,
                'd_gender_radio' => $member_data->d_gender_radio,
                'd_rel' => $member_data->d_rel,
                'd_contact' => $member_data->d_contact,
                'd_tax' => $member_data->d_tax,

                'thirdpartycheck' => $member_data->thirdpartycheck,
                'bankname' => $member_data->bankname,
                'accholderid' => $member_data->accholderid,
                'accholder' => $member_data->accholder,
                'accholdersurname' => $member_data->accholdersurname,
                'accnum' => $member_data->accnum,
                'acctype' => $member_data->acctype,
                'debitdate' => $member_data->debitdate,
                'branchcode' => $member_data->branchcode,
                'branchname' => $member_data->branchname,
                'verification' => $member_data->verification,
                'idvalidation' => $member_data->idvalidation,
                'consentupload' => $member_data->consentupload,

                'thirdpartycheck' => $member_data->thirdpartycheck,
                'sameacccheck' => $member_data->sameacccheck,
                'bankname' => $member_data->bankname,
                'accholderid' => $member_data->accholderid,
                'accholder' => $member_data->accholder,
                'accholdersurname' => $member_data->accholdersurname,
                'accnum' => $member_data->accnum,
                'acctype' => $member_data->acctype,
                'debitdate' => $member_data->debitdate,
                'branchcode' => $member_data->branchcode,
                'branchname' => $member_data->branchname,

                'medical_questions' => $member_data->medical_questions,
                'fullname' => $member_data->fullname,
                'illness' => $member_data->illness,
                'treated' => $member_data->treated,
                'firsttreatmentdate' => $member_data->firsttreatmentdate,
                'lasttreatmentdate' => $member_data->lasttreatmentdate,
                'gpfullname' => $member_data->gpfullname,

                
                'fullname' => $member_data->fullname,
                'firstdocname' => $member_data->firstdocname,
                'firstdocpnum' => $member_data->firstdocpnum,
                'seconddocname' => $member_data->seconddocname,
                'seconddocpnum' => $member_data->seconddocpnum,
                'capturedby' => $member_data->capturedby,
                'medstart_date' => $member_data->medstart_date,
                'brokercode' => $member_data->brokercode,
                'brokeremail' => $member_data->brokeremail,
                'brokeragename' => $member_data->brokeragename,
                'terms_agreement' => $member_data->terms_agreement,
                'advisor_dates' => $member_data->advisor_dates,
                'advisor_memfullname' => $member_data->advisor_memfullname,
                'mem_declaration' => $member_data->mem_declaration,
                'membership_num' => $member_data->membership_num,
                'reference_id' => $member_data->reference_id,
                    
            ];

            if($member_data->m_email !='')
            {
                Mail::to($member_data->m_email)->send(new NoMedSchemeMail($data));
                return Redirect::to('/view-submitted/'.$member_id)->withSuccess('Copy of the Application Successfully sent to member');
            }else{
                return Redirect::to('/view-submitted/'.$member_id)->withFail("There's an issue with the member email! Either invalid or not found");
            }
        
        }elseif(!empty($depsUserId) && !empty($medscUserId) && empty($medqUserId) && !empty($gpnomUserId)){
            $member_data = DB::table('tbl_advisors')
                        ->join('tbl_members','tbl_advisors.user_id', '=','tbl_members.user_id')
                        ->join('tbl_members_contacts','tbl_advisors.user_id', '=','tbl_members_contacts.user_id')
                        ->join('tbl_dependents','tbl_advisors.user_id', '=', 'tbl_dependents.user_id')
                        ->join('tbl_banks_contributions','tbl_advisors.user_id', '=', 'tbl_banks_contributions.user_id')
                        ->join('tbl_banks_refunds','tbl_advisors.user_id', '=', 'tbl_banks_refunds.user_id')
                        ->join('tbl_medical_scheme','tbl_advisors.user_id', '=', 'tbl_medical_scheme.user_id')
                        // ->join('tbl_medical_questions','tbl_advisors.user_id', '=', 'tbl_medical_questions.user_id')
                        ->join('tbl_gpnominations','tbl_advisors.user_id', '=', 'tbl_gpnominations.user_id')
                        // ->select('tbl_advisors.*','tbl_members.*')
                        ->where('tbl_advisors.user_id',$member_id)
                        ->first();
            $data = [
                'mainid_number' => $member_data->mainid_number,
                'main_title' => $member_data->main_title,
                'main_surname' => $member_data->main_surname,
                'main_firstname' => $member_data->main_firstname,
                'main_initial' => $member_data->main_initial,
                'main_marital' => $member_data->main_marital,
                'mgender_radio' => $member_data->mgender_radio,
                'm_dob' => $member_data->m_dob,
                'main_lang' => $member_data->main_lang,
                'm_race' => $member_data->m_race,
                'm_deps_radio' => $member_data->m_deps_radio,
                'capturedby' => $member_data->capturedby,
                'created_at' => $member_data->created_at,
                'm_cell' => $member_data->m_cell,
                'm_telh' => $member_data->m_telh,
                'm_telw' => $member_data->m_telw,
                'mtax' => $member_data->mtax,
                'm_email' => $member_data->m_email,
                'mainid_pobox' => $member_data->mainid_pobox,
                'm_psnum' => $member_data->m_psnum,
                'm_psname' => $member_data->m_psname,
                'm_pstype' => $member_data->m_pstype,
                'm_psuburb' => $member_data->m_psuburb,
                'm_postalcode' => $member_data->m_postalcode,
                'm_ssnum' => $member_data->m_ssnum,
                'm_ssname' => $member_data->m_ssname,
                'm_sstype' => $member_data->m_sstype,
                'm_ssuburb' => $member_data->m_ssuburb,
                'm_spostalcode' => $member_data->m_spostalcode,

                'dep_title' => $member_data->dep_title,
                'd_idpass' => $member_data->d_idpass,
                'd_firstname' => $member_data->d_firstname,
                'd_surname' => $member_data->d_surname,
                'd_dob' => $member_data->d_dob,
                'd_marital' => $member_data->d_marital,
                'd_race' => $member_data->d_race,
                'm_psname' => $member_data->m_psname,
                'd_gender_radio' => $member_data->d_gender_radio,
                'd_rel' => $member_data->d_rel,
                'd_contact' => $member_data->d_contact,
                'd_tax' => $member_data->d_tax,

                'thirdpartycheck' => $member_data->thirdpartycheck,
                'bankname' => $member_data->bankname,
                'accholderid' => $member_data->accholderid,
                'accholder' => $member_data->accholder,
                'accholdersurname' => $member_data->accholdersurname,
                'accnum' => $member_data->accnum,
                'acctype' => $member_data->acctype,
                'debitdate' => $member_data->debitdate,
                'branchcode' => $member_data->branchcode,
                'branchname' => $member_data->branchname,
                'verification' => $member_data->verification,
                'idvalidation' => $member_data->idvalidation,
                'consentupload' => $member_data->consentupload,

                'thirdpartycheck' => $member_data->thirdpartycheck,
                'sameacccheck' => $member_data->sameacccheck,
                'bankname' => $member_data->bankname,
                'accholderid' => $member_data->accholderid,
                'accholder' => $member_data->accholder,
                'accholdersurname' => $member_data->accholdersurname,
                'accnum' => $member_data->accnum,
                'acctype' => $member_data->acctype,
                'debitdate' => $member_data->debitdate,
                'branchcode' => $member_data->branchcode,
                'branchname' => $member_data->branchname,

                'fullname' => $member_data->fullname,
                'medscheme' => $member_data->medscheme,
                'membership_num' => $member_data->membership_num,
                'accholdersurname' => $member_data->accholdersurname,
                'medjoindate' => $member_data->medjoindate,
                'medenddate' => $member_data->medenddate,
                'comupload' => $member_data->comupload,

                
                'fullname' => $member_data->fullname,
                'firstdocname' => $member_data->firstdocname,
                'firstdocpnum' => $member_data->firstdocpnum,
                'seconddocname' => $member_data->seconddocname,
                'seconddocpnum' => $member_data->seconddocpnum,
                'capturedby' => $member_data->capturedby,
                'medstart_date' => $member_data->medstart_date,
                'brokercode' => $member_data->brokercode,
                'brokeremail' => $member_data->brokeremail,
                'brokeragename' => $member_data->brokeragename,
                'terms_agreement' => $member_data->terms_agreement,
                'advisor_dates' => $member_data->advisor_dates,
                'advisor_memfullname' => $member_data->advisor_memfullname,
                'mem_declaration' => $member_data->mem_declaration,
                'membership_num' => $member_data->membership_num,
                'reference_id' => $member_data->reference_id,
                    
            ];

            if($member_data->m_email !='')
            {
                Mail::to($member_data->m_email)->send(new NoMedQsMail($data));
                return Redirect::to('/view-submitted/'.$member_id)->withSuccess('Copy of the Application Successfully sent to member');
            }else{
                return Redirect::to('/view-submitted/'.$member_id)->withFail("There's an issue with the member email! Either invalid or not found");
            }
        }
        elseif(!empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && empty($gpnomUserId)){
            $member_data = DB::table('tbl_advisors')
                        ->join('tbl_members','tbl_advisors.user_id', '=','tbl_members.user_id')
                        ->join('tbl_members_contacts','tbl_advisors.user_id', '=','tbl_members_contacts.user_id')
                        ->join('tbl_dependents','tbl_advisors.user_id', '=', 'tbl_dependents.user_id')
                        ->join('tbl_banks_contributions','tbl_advisors.user_id', '=', 'tbl_banks_contributions.user_id')
                        ->join('tbl_banks_refunds','tbl_advisors.user_id', '=', 'tbl_banks_refunds.user_id')
                        ->join('tbl_medical_scheme','tbl_advisors.user_id', '=', 'tbl_medical_scheme.user_id')
                        ->join('tbl_medical_questions','tbl_advisors.user_id', '=', 'tbl_medical_questions.user_id')
                        //->join('tbl_gpnominations','tbl_advisors.user_id', '=', 'tbl_gpnominations.user_id')
                        // ->select('tbl_advisors.*','tbl_members.*')
                        ->where('tbl_advisors.user_id',$member_id)
                        ->first();

            
            $data = [
                'mainid_number' => $member_data->mainid_number,
                'main_title' => $member_data->main_title,
                'main_surname' => $member_data->main_surname,
                'main_firstname' => $member_data->main_firstname,
                'main_initial' => $member_data->main_initial,
                'main_marital' => $member_data->main_marital,
                'mgender_radio' => $member_data->mgender_radio,
                'm_dob' => $member_data->m_dob,
                'main_lang' => $member_data->main_lang,
                'm_race' => $member_data->m_race,
                'm_deps_radio' => $member_data->m_deps_radio,
                'capturedby' => $member_data->capturedby,
                'created_at' => $member_data->created_at,
                'm_cell' => $member_data->m_cell,
                'm_telh' => $member_data->m_telh,
                'm_telw' => $member_data->m_telw,
                'mtax' => $member_data->mtax,
                'm_email' => $member_data->m_email,
                'mainid_pobox' => $member_data->mainid_pobox,
                'm_psnum' => $member_data->m_psnum,
                'm_psname' => $member_data->m_psname,
                'm_pstype' => $member_data->m_pstype,
                'm_psuburb' => $member_data->m_psuburb,
                'm_postalcode' => $member_data->m_postalcode,
                'm_ssnum' => $member_data->m_ssnum,
                'm_ssname' => $member_data->m_ssname,
                'm_sstype' => $member_data->m_sstype,
                'm_ssuburb' => $member_data->m_ssuburb,
                'm_spostalcode' => $member_data->m_spostalcode,

                'dep_title' => $member_data->dep_title,
                'd_idpass' => $member_data->d_idpass,
                'd_firstname' => $member_data->d_firstname,
                'd_surname' => $member_data->d_surname,
                'd_dob' => $member_data->d_dob,
                'd_marital' => $member_data->d_marital,
                'd_race' => $member_data->d_race,
                'm_psname' => $member_data->m_psname,
                'd_gender_radio' => $member_data->d_gender_radio,
                'd_rel' => $member_data->d_rel,
                'd_contact' => $member_data->d_contact,
                'd_tax' => $member_data->d_tax,

                'thirdpartycheck' => $member_data->thirdpartycheck,
                'bankname' => $member_data->bankname,
                'accholderid' => $member_data->accholderid,
                'accholder' => $member_data->accholder,
                'accholdersurname' => $member_data->accholdersurname,
                'accnum' => $member_data->accnum,
                'acctype' => $member_data->acctype,
                'debitdate' => $member_data->debitdate,
                'branchcode' => $member_data->branchcode,
                'branchname' => $member_data->branchname,
                'verification' => $member_data->verification,
                'idvalidation' => $member_data->idvalidation,
                'consentupload' => $member_data->consentupload,

                'thirdpartycheck' => $member_data->thirdpartycheck,
                'sameacccheck' => $member_data->sameacccheck,
                'bankname' => $member_data->bankname,
                'accholderid' => $member_data->accholderid,
                'accholder' => $member_data->accholder,
                'accholdersurname' => $member_data->accholdersurname,
                'accnum' => $member_data->accnum,
                'acctype' => $member_data->acctype,
                'debitdate' => $member_data->debitdate,
                'branchcode' => $member_data->branchcode,
                'branchname' => $member_data->branchname,

                'fullname' => $member_data->fullname,
                'medscheme' => $member_data->medscheme,
                'membership_num' => $member_data->membership_num,
                'accholdersurname' => $member_data->accholdersurname,
                'medjoindate' => $member_data->medjoindate,
                'medenddate' => $member_data->medenddate,
                'comupload' => $member_data->comupload,

                'medical_questions' => $member_data->medical_questions,
                'fullname' => $member_data->fullname,
                'illness' => $member_data->illness,
                'treated' => $member_data->treated,
                'firsttreatmentdate' => $member_data->firsttreatmentdate,
                'lasttreatmentdate' => $member_data->lasttreatmentdate,
                'gpfullname' => $member_data->gpfullname,

                'capturedby' => $member_data->capturedby,
                'medstart_date' => $member_data->medstart_date,
                'brokercode' => $member_data->brokercode,
                'brokeremail' => $member_data->brokeremail,
                'brokeragename' => $member_data->brokeragename,
                'terms_agreement' => $member_data->terms_agreement,
                'advisor_dates' => $member_data->advisor_dates,
                'advisor_memfullname' => $member_data->advisor_memfullname,
                'mem_declaration' => $member_data->mem_declaration,
                'membership_num' => $member_data->membership_num,
                'reference_id' => $member_data->reference_id,
                    
            ];

            if($member_data->m_email !='')
            {
                Mail::to($member_data->m_email)->send(new NoGpNoms($data));
                return Redirect::to('/view-submitted/'.$member_id)->withSuccess('Copy of the Application Successfully sent to member');
            }else{
                return Redirect::to('/view-submitted/'.$member_id)->withFail("There's an issue with the member email! Either invalid or not found");
            }
        }else{
            $member_data = DB::table('tbl_advisors')
                        ->join('tbl_members','tbl_advisors.user_id', '=','tbl_members.user_id')
                        ->join('tbl_members_contacts','tbl_advisors.user_id', '=','tbl_members_contacts.user_id')
                        //->join('tbl_dependents','tbl_advisors.user_id', '=', 'tbl_dependents.user_id')
                        ->join('tbl_banks_contributions','tbl_advisors.user_id', '=', 'tbl_banks_contributions.user_id')
                        ->join('tbl_banks_refunds','tbl_advisors.user_id', '=', 'tbl_banks_refunds.user_id')
                        //->join('tbl_medical_scheme','tbl_advisors.user_id', '=', 'tbl_medical_scheme.user_id')
                        //->join('tbl_medical_questions','tbl_advisors.user_id', '=', 'tbl_medical_questions.user_id')
                        //->join('tbl_gpnominations','tbl_advisors.user_id', '=', 'tbl_gpnominations.user_id')
                        //->select('tbl_advisors.*','tbl_members.*')
                        ->where('tbl_advisors.user_id',$member_id)
                        ->first();
                $data = [
                    'mainid_number' => $member_data->mainid_number,
                    'main_title' => $member_data->main_title,
                    'main_surname' => $member_data->main_surname,
                    'main_firstname' => $member_data->main_firstname,
                    'main_initial' => $member_data->main_initial,
                    'main_marital' => $member_data->main_marital,
                    'mgender_radio' => $member_data->mgender_radio,
                    'm_dob' => $member_data->m_dob,
                    'main_lang' => $member_data->main_lang,
                    'm_race' => $member_data->m_race,
                    'm_deps_radio' => $member_data->m_deps_radio,
                    'capturedby' => $member_data->capturedby,
                    'created_at' => $member_data->created_at,
                    'm_cell' => $member_data->m_cell,
                    'm_telh' => $member_data->m_telh,
                    'm_telw' => $member_data->m_telw,
                    'mtax' => $member_data->mtax,
                    'm_email' => $member_data->m_email,
                    'mainid_pobox' => $member_data->mainid_pobox,
                    'm_psnum' => $member_data->m_psnum,
                    'm_psname' => $member_data->m_psname,
                    'm_pstype' => $member_data->m_pstype,
                    'm_psuburb' => $member_data->m_psuburb,
                    'm_postalcode' => $member_data->m_postalcode,
                    'm_ssnum' => $member_data->m_ssnum,
                    'm_ssname' => $member_data->m_ssname,
                    'm_sstype' => $member_data->m_sstype,
                    'm_ssuburb' => $member_data->m_ssuburb,
                    'm_spostalcode' => $member_data->m_spostalcode,
    
                    'thirdpartycheck' => $member_data->thirdpartycheck,
                    'bankname' => $member_data->bankname,
                    'accholderid' => $member_data->accholderid,
                    'accholder' => $member_data->accholder,
                    'accholdersurname' => $member_data->accholdersurname,
                    'accnum' => $member_data->accnum,
                    'acctype' => $member_data->acctype,
                    'debitdate' => $member_data->debitdate,
                    'branchcode' => $member_data->branchcode,
                    'branchname' => $member_data->branchname,
                    'verification' => $member_data->verification,
                    'idvalidation' => $member_data->idvalidation,
                    'consentupload' => $member_data->consentupload,
    
                    'thirdpartycheck' => $member_data->thirdpartycheck,
                    'sameacccheck' => $member_data->sameacccheck,
                    'bankname' => $member_data->bankname,
                    'accholderid' => $member_data->accholderid,
                    'accholder' => $member_data->accholder,
                    'accholdersurname' => $member_data->accholdersurname,
                    'accnum' => $member_data->accnum,
                    'acctype' => $member_data->acctype,
                    'debitdate' => $member_data->debitdate,
                    'branchcode' => $member_data->branchcode,
                    'branchname' => $member_data->branchname,
                    'capturedby' => $member_data->capturedby,
                    'medstart_date' => $member_data->medstart_date,
                    'brokercode' => $member_data->brokercode,
                    'brokeremail' => $member_data->brokeremail,
                    'brokeragename' => $member_data->brokeragename,
                    'terms_agreement' => $member_data->terms_agreement,
                    'advisor_dates' => $member_data->advisor_dates,
                    'advisor_memfullname' => $member_data->advisor_memfullname,
                    'mem_declaration' => $member_data->mem_declaration,
                    'membership_num' => $member_data->membership_num,
                    'reference_id' => $member_data->reference_id,
                        
                ];
    
                if($member_data->m_email !='')
                {
                    Mail::to($member_data->m_email)->send(new MailMember($data));
                    return Redirect::to('/view-submitted/'.$member_id)->withSuccess('Copy of the Application Successfully sent to member');
                }else{
                    return Redirect::to('/view-submitted/'.$member_id)->withFail("There's an issue with the member email! Either invalid or not found");
                }
        }


        //end of ifs
    }

    public function preview($member_id)
    {
        //start of ifs
        $depsUserId = DB::table('tbl_dependents')
                        // ->find('user_id')
                        ->where('user_id',$member_id)
                        ->first();

        // dd($depsUserId);

        $medscUserId = DB::table('tbl_medical_scheme')
                ->select('user_id')
                ->where('user_id',$member_id)
                ->first();

        $medqUserId = DB::table('tbl_medical_questions')
                ->select('user_id')
                ->where('user_id',$member_id)
                ->first();

        $gpnomUserId = DB::table('tbl_gpnominations')
                ->select('user_id')
                ->where('user_id',$member_id)
                ->first();


        if(!empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId))
        {
            $member_data = [
                'full_data' => DB::table('tbl_advisors')
                                    ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                    ->join('tbl_members_contacts', 'tbl_advisors.user_id', '=', 'tbl_members_contacts.user_id')
                                    ->where('tbl_advisors.user_id', $member_id)
                                    ->get()
            ];
            $deps = [
                'deps_data' => DB::table('tbl_dependents')
                                    ->where('user_id', $member_id)
                                    ->get()
            ];
            $medscheme = [
                'medscheme_data' => DB::table('tbl_medical_scheme')
                                        ->where('user_id', $member_id)
                                        ->get()
            ];
            $medical_questions = [
                'medq_data' => DB::table('tbl_medical_questions')
                                    ->where('user_id', $member_id)
                                    ->get()
            ];
            $gpnominations = [
                'nominations_data' => DB::table('tbl_gpnominations')
                                            ->where('user_id', $member_id)
                                            ->get()
            ];

            return view('documents.pdf_copy',$member_data, $deps, $medscheme, $medical_questions, $gpnominations);

            }elseif(empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId)){
                
                $member_data = [
                    'full_data' => DB::table('tbl_advisors')
                                        ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                        ->join('tbl_members_contacts', 'tbl_advisors.user_id', '=', 'tbl_members_contacts.user_id')
                                        ->where('tbl_advisors.user_id', $member_id)
                                        ->get()
                ];
                
                $medscheme = [
                    'medscheme_data' => DB::table('tbl_medical_scheme')
                                            ->where('user_id', $member_id)
                                            ->get()
                ];
                $medical_questions = [
                    'medq_data' => DB::table('tbl_medical_questions')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                $gpnominations = [
                    'nominations_data' => DB::table('tbl_gpnominations')
                                                ->where('user_id', $member_id)
                                                ->get()
                ];

            return view('documents.pdf_nodeps',$member_data, $medscheme, $medical_questions, $gpnominations);

            }elseif(!empty($depsUserId) && empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId)){
                
                $member_data = [
                    'full_data' => DB::table('tbl_advisors')
                                        ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                        ->join('tbl_members_contacts', 'tbl_advisors.user_id', '=', 'tbl_members_contacts.user_id')
                                        ->where('tbl_advisors.user_id', $member_id)
                                        ->get()
                ];
                $deps = [
                    'deps_data' => DB::table('tbl_dependents')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                $medical_questions = [
                    'medq_data' => DB::table('tbl_medical_questions')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                $gpnominations = [
                    'nominations_data' => DB::table('tbl_gpnominations')
                                                ->where('user_id', $member_id)
                                                ->get()
                ];

            return view('documents.pdf_nomedscheme',$member_data, $deps, $medical_questions, $gpnominations);

            }elseif(!empty($depsUserId) && !empty($medscUserId) && empty($medqUserId) && !empty($gpnomUserId)){
                $member_data = [
                    'full_data' => DB::table('tbl_advisors')
                                        ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                        ->join('tbl_members_contacts', 'tbl_advisors.user_id', '=', 'tbl_members_contacts.user_id')
                                        ->where('tbl_advisors.user_id', $member_id)
                                        ->get()
                ];
                $deps = [
                    'deps_data' => DB::table('tbl_dependents')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                $medscheme = [
                    'medscheme_data' => DB::table('tbl_medical_scheme')
                                            ->where('user_id', $member_id)
                                            ->get()
                ];
                $gpnominations = [
                    'nominations_data' => DB::table('tbl_gpnominations')
                                                ->where('user_id', $member_id)
                                                ->get()
                ];

            return view('documents.pdf_nomedq',$member_data, $deps, $medscheme, $gpnominations);
        }
        elseif(!empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && empty($gpnomUserId)){
            $member_data = [
                'full_data' => DB::table('tbl_advisors')
                                    ->join('tbl_members', 'tbl_advisors.user_id','=', 'tbl_members.user_id')
                                    ->join('tbl_members_contacts', 'tbl_advisors.user_id', '=', 'tbl_members_contacts.user_id')
                                    ->where('tbl_advisors.user_id', $member_id)
                                    ->get()
            ];
            $deps = [
                'deps_data' => DB::table('tbl_dependents')
                                    ->where('user_id', $member_id)
                                    ->get()
            ];
            $medscheme = [
                'medscheme_data' => DB::table('tbl_medical_scheme')
                                        ->where('user_id', $member_id)
                                        ->get()
            ];
            $medical_questions = [
                'medq_data' => DB::table('tbl_medical_questions')
                                    ->where('user_id', $member_id)
                                    ->get()
            ];

            return view('documents.pdf_nogpnoms',$member_data, $deps, $medscheme, $medical_questions);
        }else{
            $member_data = [
                'full_data' => DB::table('tbl_advisors')
                                    ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                    ->join('tbl_members_contacts', 'tbl_advisors.user_id', '=', 'tbl_members_contacts.user_id')
                                    ->where('tbl_advisors.user_id', $member_id)
                                    ->get()
            ];

            return view('documents.pdf_empty',$member_data);
        }
            
    }

    public function create_pdf($member_id)
    {
        //start of ifs
        $depsUserId = DB::table('tbl_dependents')
                        // ->find('user_id')
                        ->where('user_id',$member_id)
                        ->first();

        // dd($depsUserId);

        $medscUserId = DB::table('tbl_medical_scheme')
                ->select('user_id')
                ->where('user_id',$member_id)
                ->first();

        $medqUserId = DB::table('tbl_medical_questions')
                ->select('user_id')
                ->where('user_id',$member_id)
                ->first();

        $gpnomUserId = DB::table('tbl_gpnominations')
                ->select('user_id')
                ->where('user_id',$member_id)
                ->first();


        if(!empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId))
        {
            $member_data = [
                'full_data' => DB::table('tbl_advisors')
                                    ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                    ->join('tbl_members_contacts', 'tbl_advisors.user_id', '=', 'tbl_members_contacts.user_id')
                                    ->join('tbl_banks_contributions', 'tbl_advisors.user_id', '=', 'tbl_banks_contributions.user_id')
                                    ->join('tbl_banks_refunds', 'tbl_advisors.user_id','=', 'tbl_banks_refunds.user_id')
                                    ->join('tbl_medical_scheme', 'tbl_advisors.user_id', '=', 'tbl_medical_scheme.user_id')
                                    ->join('tbl_medical_questions', 'tbl_advisors.user_id', '=', 'tbl_medical_questions.user_id')
                                    ->join('tbl_gpnominations', 'tbl_advisors.user_id', '=', 'tbl_gpnominations.user_id')
                                    ->where('tbl_advisors.user_id', $member_id)
                                    ->get()
            ];
            $deps = [
                'deps_data' => DB::table('tbl_dependents')
                                    ->where('user_id', $member_id)
                                    ->get()
            ];
            $member = DB::table('tbl_members')
                            ->where('user_id', $member_id)
                            ->first();

            $pdf = PDF::loadview('documents.pdf_copy', $member_data, $deps);
            return $pdf->download('bonitas_medical_fund_application_'.$member->main_surname. ' '.$member->main_initial.'.pdf');

            }elseif(empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId)){
                
                $member_data = [
                    'full_data' => DB::table('tbl_advisors')
                                        ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                        ->join('tbl_members_contacts', 'tbl_advisors.user_id', '=', 'tbl_members_contacts.user_id')
                                        ->join('tbl_banks_contributions', 'tbl_advisors.user_id', '=', 'tbl_banks_contributions.user_id')
                                        ->join('tbl_banks_refunds', 'tbl_advisors.user_id','=', 'tbl_banks_refunds.user_id')
                                        ->where('tbl_advisors.user_id', $member_id)
                                        ->get()
                ];
                
                $medscheme = [
                    'medscheme_data' => DB::table('tbl_medical_scheme')
                                            ->where('user_id', $member_id)
                                            ->get()
                ];
                $medical_questions = [
                    'medq_data' => DB::table('tbl_medical_questions')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                $gpnominations = [
                    'nominations_data' => DB::table('tbl_gpnominations')
                                                ->where('user_id', $member_id)
                                                ->get()
                ];
                $member = DB::table('tbl_members')
                            ->where('user_id', $member_id)
                            ->first();

                $pdf = PDF::loadview('documents.pdf_nodeps', $member_data, $medscheme, $medical_questions, $gpnominations);
                return $pdf->download('bonitas_medical_fund_application_'.$member->main_surname. ' '.$member->main_initial.'.pdf');

            }elseif(!empty($depsUserId) && empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId)){
                
                $member_data = [
                    'full_data' => DB::table('tbl_advisors')
                                        ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                        ->join('tbl_members_contacts', 'tbl_advisors.user_id', '=', 'tbl_members_contacts.user_id')
                                        ->join('tbl_banks_contributions', 'tbl_advisors.user_id', '=', 'tbl_banks_contributions.user_id')
                                        ->join('tbl_banks_refunds', 'tbl_advisors.user_id','=', 'tbl_banks_refunds.user_id')
                                        ->join('tbl_medical_questions', 'tbl_advisors.user_id', '=', 'tbl_medical_questions.user_id')
                                        ->join('tbl_gpnominations', 'tbl_advisors.user_id', '=', 'tbl_gpnominations.user_id')
                                        ->where('tbl_advisors.user_id', $member_id)
                                        ->get()
                ];
                $deps = [
                    'deps_data' => DB::table('tbl_dependents')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                $member = DB::table('tbl_members')
                            ->where('user_id', $member_id)
                            ->first();

                $pdf = PDF::loadview('documents.pdf_nomedscheme', $member_data, $deps);
                return $pdf->download('bonitas_medical_fund_application_'.$member->main_surname. ' '.$member->main_initial.'.pdf');

            }elseif(!empty($depsUserId) && !empty($medscUserId) && empty($medqUserId) && !empty($gpnomUserId)){
                $member_data = [
                    'full_data' => DB::table('tbl_advisors')
                                        ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                        ->join('tbl_members_contacts', 'tbl_advisors.user_id', '=', 'tbl_members_contacts.user_id')
                                        ->join('tbl_banks_contributions', 'tbl_advisors.user_id', '=', 'tbl_banks_contributions.user_id')
                                        ->join('tbl_banks_refunds', 'tbl_advisors.user_id','=', 'tbl_banks_refunds.user_id')
                                        ->join('tbl_medical_scheme', 'tbl_advisors.user_id', '=', 'tbl_medical_scheme.user_id')
                                        ->join('tbl_gpnominations', 'tbl_advisors.user_id', '=', 'tbl_gpnominations.user_id')
                                        ->where('tbl_advisors.user_id', $member_id)
                                        ->get()
                ];
                $deps = [
                    'deps_data' => DB::table('tbl_dependents')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                
                $member = DB::table('tbl_members')
                            ->where('user_id', $member_id)
                            ->first();

                $pdf = PDF::loadview('documents.pdf_nomedq', $member_data, $deps);
                return $pdf->download('bonitas_medical_fund_application_'.$member->main_surname. ' ' .$member->main_initial.'.pdf');
        }
        elseif(!empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && empty($gpnomUserId)){
            $member_data = [
                'full_data' => DB::table('tbl_advisors')
                                    ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                    ->join('tbl_members_contacts', 'tbl_advisors.user_id', '=', 'tbl_members_contacts.user_id')
                                    ->join('tbl_banks_contributions', 'tbl_advisors.user_id', '=', 'tbl_banks_contributions.user_id')
                                    ->join('tbl_banks_refunds', 'tbl_advisors.user_id','=', 'tbl_banks_refunds.user_id')
                                    ->join('tbl_medical_scheme', 'tbl_advisors.user_id', '=', 'tbl_medical_scheme.user_id')
                                    ->join('tbl_medical_questions', 'tbl_advisors.user_id', '=', 'tbl_medical_questions.user_id')
                                    ->where('tbl_advisors.user_id', $member_id)
                                    ->get()
            ];
            $deps = [
                'deps_data' => DB::table('tbl_dependents')
                                    ->where('user_id', $member_id)
                                    ->get()
            ];
            $member = DB::table('tbl_members')
                            ->where('user_id', $member_id)
                            ->first();

            $pdf = PDF::loadview('documents.pdf_nogpnoms', $member_data, $deps);
            return $pdf->download('bonitas_medical_fund_application_'.$member->main_surname. ' ' .$member->main_initial.'.pdf');
        }else{
            $member_data = [
                'full_data' => DB::table('tbl_advisors')
                                    ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                    ->join('tbl_members_contacts', 'tbl_advisors.user_id', '=', 'tbl_members_contacts.user_id')
                                    ->join('tbl_banks_contributions', 'tbl_advisors.user_id', '=', 'tbl_banks_contributions.user_id')
                                    ->join('tbl_banks_refunds', 'tbl_advisors.user_id','=', 'tbl_banks_refunds.user_id')
                                    ->where('tbl_advisors.user_id', $member_id)
                                    ->get()
            ];
            $member = DB::table('tbl_members')
                            ->where('user_id', $member_id)
                            ->first();

            $pdf = PDF::loadview('documents.pdf_empty', $member_data);
            return $pdf->download('bonitas_medical_fund_application_'.$member->main_surname. ' ' .$member->main_initial.'.pdf');
        }
            
    }

    public function individual_form()
    {
        $this->AuthCheck();
        return view('forms.individual');
    }
    public function fed_individual()
    {
        $this->AuthCheck();
        return view('forms.fed_individual');
    }
    public function group()
    {
        $this->AuthCheck();
        return view('forms.group');
    }
    public function test()
    {
        // $this->AuthCheck();
        return view('forms.test');
    }

    public function all_submitted()
    {
        $this->AuthCheck();
        return view('hub.all_submitted');
    }

    public function get_month(Request $request)
    {
        $month = $request->month;
        $brokercode = Session::get('brokercode');

        $data = DB::table('tbl_advisors')
                    ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                    // ->select('tbl_advisors.caputuredby','tbl_advisors.created_at','tbl_advisors.main_surname','tbl_advisors.main_firstname')
                    ->whereMonth('tbl_advisors.created_at',$month)
                    ->where('tbl_advisors.status',1)
                    ->where('tbl_advisors.brokercode', $brokercode)
                    ->get();

        //dd($data);

        // $data = DB::table('tbl_advisors')
        //             ->whereMonth('created_at', $month)
        //             ->where('status',0)
        //             ->get();


        return response()->json([
            'data'=>$data]);  
    }

    public function edit_application($user_id)
    {
        $advUserId = [
            'advisors' => DB::table('tbl_advisors')
                            // ->find('user_id')
                            ->where('user_id',$user_id)
                            ->get()
        ];

        $Member = [
           'members' => DB::table('tbl_members')
                        // ->find('user_id')
                        ->where('user_id',$user_id)
                        ->get()
            ];
        
        $Dependent = [
            'dependents' => DB::table('tbl_dependents')
                                ->where('user_id', $user_id)
                                ->get()
        ];
        $Contribution = [
            'contributions' => DB::table('tbl_banks_contributions')
                                    ->where('user_id', $user_id)
                                    ->get()
        ];
        $Refund = [
            'refunds' => DB::table('tbl_banks_refunds')
                                ->where('user_id', $user_id)
                                ->get()
        ];
        $MedQuestion = [
            'medical_questions' => DB::table('tbl_medical_questions')
                                        ->where('user_id', $user_id)
                                        ->get()
        ];
        $MedicalScheme = [
            'medical_schemes' => DB::table('tbl_medical_scheme')
                                        ->where('user_id', $user_id)
                                        ->get()
        ];
        $GPNomination = [
            'nominations' => DB::table('tbl_gpnominations')
                                    ->where('user_id', $user_id)
                                    ->get()
        ];
        return view('forms.individual_edit',$advUserId, $Member);

        // $advUserId = DB::table('tbl_members')
        //                     // ->find('user_id')
        //                     ->where('user_id',$user_id)
        //                     ->first();
        // dump($advUserId);
        
        // $depsUserId = DB::table('tbl_dependents')
        //                     // ->find('user_id')
        //                     ->where('user_id',$user_id)
        //                     ->first();

        // dump($depsUserId);

        // $medscUserId = DB::table('tbl_medical_scheme')
        //                     ->select('user_id')
        //                     ->where('user_id',$user_id)
        //                     ->first();
        // dump($medscUserId);
        // $medqUserId = DB::table('tbl_medical_questions')
        //                     ->select('user_id')
        //                     ->where('user_id',$user_id)
        //                     ->first();
        // dump($medqUserId);
        
        // $gpnomUserId = DB::table('tbl_gpnominations')
        //                     ->select('user_id')
        //                     ->where('user_id',$user_id)
        //                     ->first();
        // dump($gpnomUserId);
      
	}
	   public function edit_group($user_id)
	    {
		$groupUserId = [
		    'grp_advi' => DB::table('grp_advisors')
		                    ->where('user_id',$user_id)
		                    ->get()
		];
	 
		$groupMember = [
		   'grp_mem' => DB::table('grp_members')
		                ->where('user_id',$user_id)
		                ->get()
		    ];
	 
		return view('forms.group_edit',$groupUserId, $groupMember);
	 
	    }

        public function pdf_download($member_id)
        {
            $memberInfo = DB::table('tbl_members')
                                ->where('user_id', $member_id)
                                ->first();

            $idnum = $memberInfo->mainid_number;
            $filename = $idnum ."-summary.pdf";
            $file = public_path()."/includes/uploads/". $filename;
            $headers = array('Content-Type: application/pdf');
            return Response::download($file, $filename, $headers);
        }
        public function pdf_download_grp($member_id)
        {
            $memberInfo = DB::table('grp_members')
                                ->where('user_id', $member_id)
                                ->first();

            $idnum = $memberInfo->mainid_number;
            $filename = $idnum ."-summary.pdf";
            $file = public_path()."/includes/uploads/". $filename;
            $headers = array('Content-Type: application/pdf');
            return Response::download($file, $filename, $headers);
        }
	 
        public function fed_edit_application($user_id)
        {
            $advUserId = [
                'advisors' => DB::table('fed_tbl_advisors')
                                // ->find('user_id')
                                ->where('user_id',$user_id)
                                ->get()
            ];
    
            $Member = [
               'members' => DB::table('fed_tbl_members')
                            // ->find('user_id')
                            ->where('user_id',$user_id)
                            ->get()
                ];
            $Contacts = [
                'contacts' => DB::table('fed_tbl_members_contacts')
                                // ->find('user_id')
                                ->where('user_id',$user_id)
                                ->get()
                    ];
                
            
            $Dependent = [
                'dependents' => DB::table('fed_tbl_dependents')
                                    ->where('user_id', $user_id)
                                    ->get()
            ];
            $Contribution = [
                'contributions' => DB::table('fed_tbl_banks_contributions')
                                        ->where('user_id', $user_id)
                                        ->get()
            ];
            $Refund = [
                'refunds' => DB::table('fed_tbl_banks_refunds')
                                    ->where('user_id', $user_id)
                                    ->get()
            ];
            $MedQuestion = [
                'medical_questions' => DB::table('fed_tbl_medical_questions')
                                            ->where('user_id', $user_id)
                                            ->get()
            ];
            $MedicalScheme = [
                'medical_schemes' => DB::table('fed_tbl_medical_scheme')
                                            ->where('user_id', $user_id)
                                            ->get()
            ];
            $GPNomination = [
                'nominations' => DB::table('fed_tbl_gpnominations')
                                        ->where('user_id', $user_id)
                                        ->get()
            ];
            return view('forms.fed_edit_application',$advUserId, $Member);
    
            // $advUserId = DB::table('tbl_members')
            //                     // ->find('user_id')
            //                     ->where('user_id',$user_id)
            //                     ->first();
            // dump($advUserId);
            
            // $depsUserId = DB::table('tbl_dependents')
            //                     // ->find('user_id')
            //                     ->where('user_id',$user_id)
            //                     ->first();
    
            // dump($depsUserId);
    
            // $medscUserId = DB::table('tbl_medical_scheme')
            //                     ->select('user_id')
            //                     ->where('user_id',$user_id)
            //                     ->first();
            // dump($medscUserId);
            // $medqUserId = DB::table('tbl_medical_questions')
            //                     ->select('user_id')
            //                     ->where('user_id',$user_id)
            //                     ->first();
            // dump($medqUserId);
            
            // $gpnomUserId = DB::table('tbl_gpnominations')
            //                     ->select('user_id')
            //                     ->where('user_id',$user_id)
            //                     ->first();
            // dump($gpnomUserId);
          
        }
//         public function getpracticeNum($name)
//         {
//             $data = DB::table('tbl_gpnework')
//                 ->where('practice_name',$name)
//                 ->select('practice_number')
//                 ->first();
//             echo json_encode($data);
//         }
 }




