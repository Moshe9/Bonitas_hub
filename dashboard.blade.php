
@extends('hub.hub_layout')
@section('content')
<!-- BEGIN: Page Main-->
<?php
        $user = DB::table('users')
        ->get();
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
                <img src="{{asset('frontend/images/bonitas_assets/Hub_Banner-May_2022.png')}}" alt="" class="banner-image">
            </div>
        </div>
    </div>
    <hr class="horizontal_line">
    <div class="col sm-8">
        <p class="title">Application Forms</p>
        <a href="{{url('/individual-form')}}" class="btn btn-bonitas btn-individual">
            INDIVIDUAL
        </a>
        <a href="{{url('/group')}}" class="btn btn-bonitas btn-individual">
            GROUP
        </a>
    </div>
    @if($user->user_type == 'SANLAM')
        <div class="col sm-12"style="margin-top: 10px;">
            <a href="{{url('/fedDashboard')}}" class="btn btn-Fedhealth btn-individual">
                Fedhealth
            </a>
      </div>
    @endif
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
                     $submitted_applications = DB::table('tbl_advisors')
                                        ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                        ->where('tbl_advisors.status',1)
                                        ->where('tbl_advisors.brokercode', $brokercode)
                                        ->get();

                 $additional_info =DB::table('tbl_advisors')
                                    ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                    ->where('tbl_advisors.status',-1)
                                    ->where('tbl_advisors.brokercode', $brokercode)
                                    ->get();
                 $pending_apps = DB::table('tbl_advisors')
                                ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                ->where('tbl_advisors.status',0)
                                ->where('tbl_advisors.brokercode', $brokercode)
                                ->get();
                  $count_ind = DB::table('tbl_advisors')
                            ->where('status',1)
                            ->where('tbl_advisors.brokercode', $brokercode)
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
                    <th colspan='3' class="table-title"> Individual Applications</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <canvas id="appsChart" height="200" data-colors='["#fd625e", "#2ab57d", "#ffbf53", "#5156be"]'> </canvas>
                            <script>
                                var sub = <?= DB::table('tbl_advisors')
                                                    ->where('status',1)
                                                    ->where('tbl_advisors.brokercode', $brokercode)
                                                    ->count(); ?>;
                                var additional = <?= DB::table('tbl_advisors')
                                                    ->where('status',-1)
                                                    ->where('tbl_advisors.brokercode', $brokercode)
                                                    ->count(); ?>;
                                var pending = <?= DB::table('tbl_advisors')
                                                    ->where('status',0)
                                                    ->where('tbl_advisors.brokercode', $brokercode)
                                                    ->count(); ?>;
                                var individualCanvas = document.getElementById("appsChart");
                                var individualData = {
                                    labels: ["Submitted: " + sub , "Additional Info: " + additional , "Pending Applications: " + pending],
                                    datasets: [{
                                        data: [sub, additional, pending],
                                        backgroundColor: [
                                            "#ba0c35",
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
                        <td colspan="4" class="table-footer"><a href="{{url('/hub-home')}}">Click to view category</a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col sm-8 mb-3 charts">
            <table class="striped table-width">
                <thead class="table-head">
                <tr>
                    <th colspan='3' class="table-title-group"> Group Applications</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <canvas id="groupChart" height="200" data-colors='["#fd625e", "#2ab57d", "#ffbf53", "#5156be"]'> </canvas>
                            <script>

                                var grpsub = <?= DB::table('grp_advisors')
                                                    ->where('status',1)
                                                    ->where('grp_advisors.brokercode', $brokercode)
                                                    ->count(); ?>;
                                var grp_additional = <?= DB::table('grp_advisors')
                                                    ->where('status',-1)
                                                    ->where('grp_advisors.brokercode', $brokercode)
                                                    ->count(); ?>;
                                var grp_pending = <?= DB::table('grp_advisors')
                                                    ->where('status',0)
                                                    ->where('grp_advisors.brokercode', $brokercode)
                                                    ->count(); ?>;
                                var groupCanvas = document.getElementById("groupChart");
                                var groupData = {
                                    labels: ["Submitted: " + grpsub , "Additional Info: " + grp_additional , "Pending Applications: " + grp_pending ],
                                    datasets: [{
                                        data: [grpsub, grp_additional, grp_pending],
                                        backgroundColor: [
                                            "#ba0c35",
                                            "#343436",
                                            "#e6d021"
                                        ]
                                    }],
                                    
                                };
                                var polarAreaChart = new Chart(groupCanvas, {
                                    type: 'polarArea',
                                    data: groupData,
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
                        <td colspan="4" class="table-footer"><a href="{{url('/group-home')}}">Click to view category</a></td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>
@endsection
