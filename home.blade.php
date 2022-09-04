
@extends('hub.hub_layout')
@section('content')

<style>
    /* body {font-family: Arial;} */

    /* Style the tab */
    .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
    background-color: #ddd;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    color: #ffffff;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
    background-color: #343436;
    }

    /* Create an active/current tablink class */
    .tab button.active {
    background-color: #ba0c35;
    color: #ffffff;
    }

    /* Style the tab content */
    .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
    }
</style>
<!-- BEGIN: Page Main-->
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
        {{-- <p>
            <a href="#" class="btn btn-bonitas-secondary btn-individual">
            PDF APPLICATIONS
            </a>
        </p> --}}
    </div>
    <div class="row">
         <hr class="horizontal_line">
    </div>
    <div class="row">
        <p class="title">Individual Applications Status</p>
    </div>
    <div class="row">

    </div>
    <div class="row">
        <div class="col sm-8 mb-3">
            <table class="striped ">
                <thead class="table-head">
                <?php
                    $submitted_applications = DB::table('tbl_advisors')
                                        ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                        ->where('tbl_advisors.status',1)
                                        ->where('tbl_advisors.brokercode', $brokercode)
                                        ->orderBy('tbl_advisors.updated_at','desc')
                                        ->orderBy('tbl_advisors.user_id','DESC')
                                        ->get();
                
                $additional_info =DB::table('tbl_advisors')
                                    ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                    ->where('tbl_advisors.status',-1)
                                    ->where('tbl_advisors.brokercode', $brokercode)
                                    ->orderBy('tbl_advisors.updated_at','desc')
                                    ->orderBy('tbl_advisors.user_id','DESC')
                                    ->get();
                $pending_apps = DB::table('tbl_advisors')
                                ->join('tbl_members', 'tbl_advisors.user_id', '=', 'tbl_members.user_id')
                                ->where('tbl_advisors.status',0)
                                ->where('tbl_advisors.brokercode', $brokercode)
                                ->orderBy('tbl_advisors.updated_at','desc')
                                ->orderBy('tbl_advisors.user_id','DESC')
                                ->get();
                $count_ind = DB::table('tbl_advisors')
                            ->where('status',1)
                            ->where('tbl_advisors.brokercode', $brokercode)
                            ->count();
                $count = $count_ind;
                ?>
                <tr>
                    <th colspan='3' class="table-title"> Submitted Applications</th>
                    <th class="table-title"><div class="badge"> New |{{$count}}</div></th>
                </tr>
                <tr style="font-size: 11px;">
                    <th>Member Name</th>
                    <th>Submission Date</th>
                    <th>Captured By</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($submitted_applications as $application)
                <tr>
                    <td>{{strtok($application->main_firstname, ' ')}}</td>
                    <td>{{$application->created_at}}</td>
                    <td>{{strtok($application->capturedby, ' ')}}</td>
                    <td > <a href="{{('/view-submitted/'.$application->user_id)}}" class="complete-action"><i class="fa fa-eye fa-lg"> </i> View</a></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="table-footer"><a href="{{url('/all-submitted')}}">Click to view all submitted info</a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col sm-8 mb-3">
            <table class="striped">
                <thead class="table-head">
                <tr>
                    <th colspan='4' class="table-title"> Additional info requred</th>
                    <th  class="table-title"></th>
                </tr>
                <tr style="font-size: 11px;">
                    <th>Member Name</th>
                    <th>Submission Date</th>
                    <th>Captured By</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                @foreach($additional_info as $info)
                <tr>
                    <td>{{strtok($info->main_firstname, ' ')}}</td>
                    <td>{{$info->created_at}}</td>
                    <td>{{strtok($info->capturedby, ' ')}}</td>
                    <td > <a href="{{('/view-submitted/'.$info->user_id)}}" class="action"><i class="fa fa-eye fa-lg"> </i> View</a></td>
                    <td>
                        <form action="{{ url('/delete-additional/'.$info->user_id) }}" method="post">
                            @csrf
                            <a href="{{ url('/delete-additional/'.$info->user_id) }}" class="show-confirm action"><i class="fa fa-trash fa-lg"></i> DEL</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col sm-8 mb-3">
            <table class="striped">
                <thead class="table-head">
                <tr>
                    <th colspan='4' class="table-title-third"> inprogress Applications</th>
                </tr>
                <tr style="font-size: 11px;">
                    <th>Member Name</th>
                    <th>Created Date</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                @foreach($pending_apps as $pend)
                <tbody>
                <tr>
                    <td>{{strtok($pend->main_firstname, ' ')}}</td>
                    <td>{{$pend->updated_at}}</td>
                    <td > <a href="{{('/edit-application/'.$pend->user_id)}}" class="action"><i class="fa fa-pencil fa-lg"> </i> Edit</a></td>
                    <td>
                        <form action="{{ url('delete-pending/'.$pend->user_id) }}" method="POST">
                            @csrf
                            <a href="{{ ('delete-pending/'.$pend->user_id) }}"class="show-confirm action"><i class="fa fa-trash fa-lg"></i> DEL</a>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({

              title: `Are you sure you want to delete this record?`,

              text: "If you delete this, it will be gone forever.",

              icon: "warning",

              buttons: true,

              dangerMode: true,

          })
          .then((willDelete) => {

            if (willDelete) {

              form.submit();

            }
          });
      });
</script>
@endsection
