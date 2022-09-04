
@extends('hub.fed_layout')
@section('content')
<!-- BEGIN: Page Main-->
<style>
        .Center {
            width:200px;
            height:200px;
            position: fixed;
            background-color: blue;
            top: 50%;
            left: 50%;
            margin-top: -100px;
            margin-left: -100px;
        }
    </style>
<?php
    $brokercode = Session::get('brokercode');
    $sessionID = Session::get('id');
    $username = Session::get('username');
?>
@foreach($userInfo as $user)

@endforeach
<div id="main">
    <div class="row">
    {{-- @foreach ($userInfo as $user)      --}}
      <div class="col sm-8">
        <img src="{{ $user->image }}"  alt="AVATAR" class="user-avatar">
      </div>
    {{-- @endforeach --}}
      <div class="col sm-8 user-info">
        <div class="paragraphs">
            <p class="username">{{ $username }}</p>
            <p class="brokerinfo">{{ $user->brokerhousename }}</p>
        </div>
      </div>
      <div class="col sm-12">
            <div class="banner">
                <img src="{{asset('frontend/images/bonitas_assets/fedasset.png')}}" alt="" class="fed_banner-image">
            </div>
        </div>
    </div>
    <hr class="horizontal_line">
    <div class="col sm-8">
        <p class="title">Application Forms</p>
    <div class="col sm-12" style="margin-top: 10px;">
    <a href="{{url('/fed-individual')}}"class="btn btn-Fedhealth btn-individual">
            Fedhealth
        </a>
    </div>
    <div class="row">
         <hr class="horizontal_line">
    </div>
    <div class="row">
        <p class="title">Application Status</p>
    </div>
    <div class="row">
        <div class="col sm-8 mb-3 charts">
            <table class="striped table-width">
                <thead class="table-head">
                <?php
                     $submitted_applications = DB::table('fed_tbl_advisors')
                                        ->join('fed_tbl_members', 'fed_tbl_advisors.user_id', '=', 'fed_tbl_members.user_id')
                                        ->where('fed_tbl_advisors.status',1)
                                        ->where('fed_tbl_advisors.brokercode', $brokercode)
                                        ->get();

                 $additional_info =DB::table('fed_tbl_advisors')
                                    ->join('fed_tbl_members', 'fed_tbl_advisors.user_id', '=', 'fed_tbl_members.user_id')
                                    ->where('fed_tbl_advisors.status',-1)
                                    ->where('fed_tbl_advisors.brokercode', $brokercode)
                                    ->get();
                 $pending_apps = DB::table('fed_tbl_advisors')
                                ->join('fed_tbl_members', 'fed_tbl_advisors.user_id', '=', 'fed_tbl_members.user_id')
                                ->where('fed_tbl_advisors.status',0)
                                ->where('fed_tbl_advisors.brokercode', $brokercode)
                                ->get();
                  $count_ind = DB::table('fed_tbl_advisors')
                            ->where('status',1)
                            ->where('fed_tbl_advisors.brokercode', $brokercode)
                             ->count();

                  //Group Application Info
                  $submitted_group = DB::table('grp_advisors')
                                        ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                        ->where('grp_advisors.status',1)
                                        ->where('grp_advisors.brokercode', $brokercode)
                                        ->get();

                 $additional_group_info =DB::table('grp_advisors')
                                    ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                    ->where('grp_advisors.status',-1)
                                    ->where('grp_advisors.brokercode', $brokercode)
                                    ->get();
                 $pending_group_apps = DB::table('grp_advisors')
                                ->join('grp_members', 'grp_advisors.user_id', '=', 'grp_members.user_id')
                                ->where('grp_advisors.status',0)
                                ->where('grp_advisors.brokercode', $brokercode)
                                ->get();
                  $count_group = DB::table('grp_advisors')
                            ->where('status',1)
                            ->where('grp_advisors.brokercode', $brokercode)
                             ->count();

                  $count = $count_ind + $count_group;
                ?>
                <tr>
                    <th colspan='3'class="fed_table-title"> Fedhealth Applications</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="margin-left:50px;">
                            <canvas id="appsChart" height="200" data-colors='["#fd625e", "#2ab57d", "#ffbf53", "#5156be"]'> </canvas>
                            <script>
                                var sub = <?= DB::table('fed_tbl_advisors')
                                                    ->where('status',1)
                                                    ->where('fed_tbl_advisors.brokercode', $brokercode)
                                                    ->count(); ?>;
                                var additional = <?= DB::table('fed_tbl_advisors')
                                                    ->where('status',-1)
                                                    ->where('fed_tbl_advisors.brokercode', $brokercode)
                                                    ->count(); ?>;
                                var pending = <?= DB::table('fed_tbl_advisors')
                                                    ->where('status',0)
                                                    ->where('fed_tbl_advisors.brokercode', $brokercode)
                                                    ->count(); ?>;
                                var individualCanvas = document.getElementById("appsChart");
                                var individualData = {
                                    labels: ["Submitted: " + sub , "Additional Info: " + additional , "Pending Applications: " + pending],
                                    datasets: [{
                                        data: [sub, additional, pending],
                                        backgroundColor: [
                                            "#01468c",
                                            "#343436",
                                            "#e6d021"
                                        ]
                                    }]
                                };
                                

                                var polarAreaChart = new Chart(individualCanvas, {
                                    type: 'polarArea',
                                    data: individualData,
                                    options:{
                                        scale:{
                                            display:false
                                        }
                                    }
                                });
                            </script>
                        </th>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="table-footer"><a href="{{url('/hub-fedhome')}}">Click to view category</a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
