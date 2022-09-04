<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupdocsController extends Controller
{
    public function group_preview($member_id)
    {
        //start of ifs
        $depsUserId = DB::table('grp_dependents')
                        // ->find('user_id')
                        ->where('user_id',$member_id)
                        ->first();

        // dd($depsUserId);

        $medscUserId = DB::table('grp_medical_scheme')
                ->select('user_id')
                ->where('user_id',$member_id)
                ->first();

        $medqUserId = DB::table('grp_medical_questions')
                ->select('user_id')
                ->where('user_id',$member_id)
                ->first();

        $gpnomUserId = DB::table('grp_gpnominations')
                ->select('user_id')
                ->where('user_id',$member_id)
                ->first();


        if(!empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId))
        {
            $member_data = [
                'full_data' => DB::table('grp_advisors')
                                    ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                    ->join('grp_members_contacts', 'grp_advisors.user_id', '=', 'grp_members_contacts.user_id')
                                    ->where('grp_advisors.user_id', $member_id)
                                    ->get()
            ];
            $deps = [
                'deps_data' => DB::table('grp_dependents')
                                    ->where('user_id', $member_id)
                                    ->get()
            ];
            $medscheme = [
                'medscheme_data' => DB::table('grp_medical_scheme')
                                        ->where('user_id', $member_id)
                                        ->get()
            ];
            $medical_questions = [
                'medq_data' => DB::table('grp_medical_questions')
                                    ->where('user_id', $member_id)
                                    ->get()
            ];
            $gpnominations = [
                'nominations_data' => DB::table('grp_gpnominations')
                                            ->where('user_id', $member_id)
                                            ->get()
            ];

            return view('documents.pdf_copy',$member_data, $deps, $medical_questions, $gpnominations);

            }elseif(empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId)){
                
                $member_data = [
                    'full_data' => DB::table('grp_advisors')
                                        ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                        ->join('grp_members_contacts', 'grp_advisors.user_id', '=', 'grp_members_contacts.user_id')
                                        ->where('grp_advisors.user_id', $member_id)
                                        ->get()
                ];
                
                $medical_questions = [
                    'medq_data' => DB::table('grp_medical_questions')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                $gpnominations = [
                    'nominations_data' => DB::table('grp_gpnominations')
                                                ->where('user_id', $member_id)
                                                ->get()
                ];

            return view('documents.pdf_nodeps',$member_data, $medical_questions, $gpnominations);

            }elseif(!empty($depsUserId) && empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId)){
                
                $member_data = [
                    'full_data' => DB::table('grp_advisors')
                                        ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                        ->join('grp_members_contacts', 'grp_advisors.user_id', '=', 'grp_members_contacts.user_id')
                                        ->where('grp_advisors.user_id', $member_id)
                                        ->get()
                ];
                $deps = [
                    'deps_data' => DB::table('grp_dependents')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                $medical_questions = [
                    'medq_data' => DB::table('grp_medical_questions')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                $gpnominations = [
                    'nominations_data' => DB::table('grp_gpnominations')
                                                ->where('user_id', $member_id)
                                                ->get()
                ];

            return view('documents.pdf_nomedscheme',$member_data, $deps, $medical_questions, $gpnominations);

            }elseif(!empty($depsUserId) && !empty($medscUserId) && empty($medqUserId) && !empty($gpnomUserId)){
                $member_data = [
                    'full_data' => DB::table('grp_advisors')
                                        ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                        ->join('grp_members_contacts', 'grp_advisors.user_id', '=', 'grp_members_contacts.user_id')
                                        ->where('grp_advisors.user_id', $member_id)
                                        ->get()
                ];
                $deps = [
                    'deps_data' => DB::table('grp_dependents')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                $gpnominations = [
                    'nominations_data' => DB::table('grp_gpnominations')
                                                ->where('user_id', $member_id)
                                                ->get()
                ];

            return view('documents.pdf_nomedq',$member_data, $deps, $gpnominations);
        }
        elseif(!empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && empty($gpnomUserId)){
            $member_data = [
                'full_data' => DB::table('grp_advisors')
                                    ->join('grp_members', 'grp_advisors.user_id','=', 'grp_members.user_id')
                                    ->join('grp_members_contacts', 'grp_advisors.user_id', '=', 'grp_members_contacts.user_id')
                                    ->where('grp_advisors.user_id', $member_id)
                                    ->get()
            ];
            $deps = [
                'deps_data' => DB::table('grp_dependents')
                                    ->where('user_id', $member_id)
                                    ->get()
            ];
            $medscheme = [
                'medscheme_data' => DB::table('grp_medical_scheme')
                                        ->where('user_id', $member_id)
                                        ->get()
            ];
            $medical_questions = [
                'medq_data' => DB::table('grp_medical_questions')
                                    ->where('user_id', $member_id)
                                    ->get()
            ];

            return view('documents.pdf_nogpnoms',$member_data, $deps, $medical_questions);
        }else{
            $member_data = [
                'full_data' => DB::table('grp_advisors')
                                    ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                    ->join('grp_members_contacts', 'grp_advisors.user_id', '=', 'grp_members_contacts.user_id')
                                    ->where('grp_advisors.user_id', $member_id)
                                    ->get()
            ];

            return view('documents.pdf_empty',$member_data);
        }
            
    }

    public function group_create_pdf($member_id)
    {
        //start of ifs
        $depsUserId = DB::table('grp_dependents')
                        // ->find('user_id')
                        ->where('user_id',$member_id)
                        ->first();

        // dd($depsUserId);

        $medscUserId = DB::table('grp_medical_scheme')
                ->select('user_id')
                ->where('user_id',$member_id)
                ->first();

        $medqUserId = DB::table('grp_medical_questions')
                ->select('user_id')
                ->where('user_id',$member_id)
                ->first();

        $gpnomUserId = DB::table('grp_gpnominations')
                ->select('user_id')
                ->where('user_id',$member_id)
                ->first();


        if(!empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId))
        {
            $member_data = [
                'full_data' => DB::table('grp_advisors')
                                    ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                    ->join('grp_members_contacts', 'grp_advisors.user_id', '=', 'grp_members_contacts.user_id')
                                    ->join('grp_banks_refunds', 'grp_advisors.user_id','=', 'grp_banks_refunds.user_id')
                                    ->where('grp_advisors.user_id', $member_id)
                                    ->get()
            ];
            $deps = [
                'deps_data' => DB::table('grp_dependents')
                                    ->where('user_id', $member_id)
                                    ->get()
            ];
            $medscheme = [
                'medscheme_data' => DB::table('grp_medical_scheme')
                                        ->where('user_id', $member_id)
                                        ->get()
            ];
            $medical_questions = [
                'medq_data' => DB::table('grp_medical_questions')
                                    ->where('user_id', $member_id)
                                    ->get()
            ];
            $gpnominations = [
                'nominations_data' => DB::table('grp_gpnominations')
                                            ->where('user_id', $member_id)
                                            ->get()
            ];
            $member = DB::table('grp_members')
                            ->where('user_id', $member_id)
                            ->first();

            $pdf = PDF::loadview('documents.pdf_copy', $member_data, $deps, $medical_questions, $gpnominations);
            return $pdf->download('bonitas_medical_fund_application_'.$member->main_surname. ' '.$member->main_initial.'.pdf');

            }elseif(empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId)){
                
                $member_data = [
                    'full_data' => DB::table('grp_advisors')
                                        ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                        ->join('grp_members_contacts', 'grp_advisors.user_id', '=', 'grp_members_contacts.user_id')
                                        ->join('grp_banks_refunds', 'grp_advisors.user_id','=', 'grp_banks_refunds.user_id')
                                        ->where('grp_advisors.user_id', $member_id)
                                        ->get()
                ];
                
                $medical_questions = [
                    'medq_data' => DB::table('grp_medical_questions')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                $gpnominations = [
                    'nominations_data' => DB::table('grp_gpnominations')
                                                ->where('user_id', $member_id)
                                                ->get()
                ];
                $member = DB::table('grp_members')
                            ->where('user_id', $member_id)
                            ->first();

                $pdf = PDF::loadview('documents.pdf_nodeps', $member_data, $medical_questions, $gpnominations);
                return $pdf->download('bonitas_medical_fund_application_'.$member->main_surname. ' '.$member->main_initial.'.pdf');

            }elseif(!empty($depsUserId) && empty($medscUserId) && !empty($medqUserId) && !empty($gpnomUserId)){
                
                $member_data = [
                    'full_data' => DB::table('grp_advisors')
                                        ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                        ->join('grp_members_contacts', 'grp_advisors.user_id', '=', 'grp_members_contacts.user_id')                                        ->join('grp_banks_refunds', 'grp_advisors.user_id','=', 'grp_banks_refunds.user_id')
                                        ->join('grp_medical_questions', 'grp_advisors.user_id', '=', 'grp_medical_questions.user_id')
                                        ->join('grp_gpnominations', 'grp_advisors.user_id', '=', 'grp_gpnominations.user_id')
                                        ->where('grp_advisors.user_id', $member_id)
                                        ->get()
                ];
                $deps = [
                    'deps_data' => DB::table('grp_dependents')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                $member = DB::table('grp_members')
                            ->where('user_id', $member_id)
                            ->first();

                $pdf = PDF::loadview('documents.pdf_nomedscheme', $member_data, $deps);
                return $pdf->download('bonitas_medical_fund_application_'.$member->main_surname. ' '.$member->main_initial.'.pdf');

            }elseif(!empty($depsUserId) && !empty($medscUserId) && empty($medqUserId) && !empty($gpnomUserId)){
                $member_data = [
                    'full_data' => DB::table('grp_advisors')
                                        ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                        ->join('grp_members_contacts', 'grp_advisors.user_id', '=', 'grp_members_contacts.user_id')                                        
                                        ->join('grp_banks_refunds', 'grp_advisors.user_id','=', 'grp_banks_refunds.user_id')
                                        ->join('grp_medical_scheme', 'grp_advisors.user_id', '=', 'grp_medical_scheme.user_id')
                                        ->join('grp_gpnominations', 'grp_advisors.user_id', '=', 'grp_gpnominations.user_id')
                                        ->where('grp_advisors.user_id', $member_id)
                                        ->get()
                ];
                $deps = [
                    'deps_data' => DB::table('grp_dependents')
                                        ->where('user_id', $member_id)
                                        ->get()
                ];
                
                $member = DB::table('grp_members')
                            ->where('user_id', $member_id)
                            ->first();

                $pdf = PDF::loadview('documents.pdf_nomedq', $member_data, $deps);
                return $pdf->download('bonitas_medical_fund_application_'.$member->main_surname. ' ' .$member->main_initial.'.pdf');
        }
        elseif(!empty($depsUserId) && !empty($medscUserId) && !empty($medqUserId) && empty($gpnomUserId)){
            $member_data = [
                'full_data' => DB::table('grp_advisors')
                                    ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                    ->join('grp_members_contacts', 'grp_advisors.user_id', '=', 'grp_members_contacts.user_id')
                                    ->join('grp_banks_refunds', 'grp_advisors.user_id','=', 'grp_banks_refunds.user_id')
                                    ->join('grp_medical_scheme', 'grp_advisors.user_id', '=', 'grp_medical_scheme.user_id')
                                    ->join('grp_medical_questions', 'grp_advisors.user_id', '=', 'grp_medical_questions.user_id')
                                    ->where('grp_advisors.user_id', $member_id)
                                    ->get()
            ];
            $deps = [
                'deps_data' => DB::table('grp_dependents')
                                    ->where('user_id', $member_id)
                                    ->get()
            ];
            $member = DB::table('grp_members')
                            ->where('user_id', $member_id)
                            ->first();

            $pdf = PDF::loadview('documents.pdf_nogpnoms', $member_data, $deps);
            return $pdf->download('bonitas_medical_fund_application_'.$member->main_surname. ' ' .$member->main_initial.'.pdf');
        }else{
            $member_data = [
                'full_data' => DB::table('grp_advisors')
                                    ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                    ->join('grp_members_contacts', 'grp_advisors.user_id', '=', 'grp_members_contacts.user_id')
                                    ->join('grp_banks_refunds', 'grp_advisors.user_id','=', 'grp_banks_refunds.user_id')
                                    ->where('grp_advisors.user_id', $member_id)
                                    ->get()
            ];
            $member = DB::table('grp_members')
                            ->where('user_id', $member_id)
                            ->first();

            $pdf = PDF::loadview('documents.pdf_empty', $member_data);
            return $pdf->download('bonitas_medical_fund_application_'.$member->main_surname. ' ' .$member->main_initial.'.pdf');
        }
            
    }
}
