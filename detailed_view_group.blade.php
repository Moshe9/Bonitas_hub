@extends('hub.hub_layout')
@section('content')
<div class="col sm-12 "style="height:82%">
    <div class="col sm-12" style="border-bottom: 300;">
        <h4 class="headings">System Queries</h4>
    </div>

    <?php $brokercode = Session::get('brokercode'); ?>
    <!-- system message start  -->
    @if(Session::has('success'))
                <div class="card-alert card gradient-45deg-green-teal">
                    <div class="card-content white-text">
                        <p>
                        <i class="material-icons">check</i> SUCCESS : {{ Session::get('success') }}</p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @elseif(Session::has('fail'))
                <div class="card-alert card gradient-45deg-red-pink">
                    <div class="card-content white-text">
                    <p>
                        <i class="material-icons">error</i> DANGER : {{ Session::get('fail') }} </p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
    <!-- system message end -->
        <div class="row">
        <hr class="horizontzl_line mb-3" style="width:90%;">
        </div>
    <div class="col sm-8 mb-3"  style="width:90%;">
        <table class="striped view-table">
            <thead class="table-head">
            <tr style="font-size: 12px;">
                <th>Member Name</th>
                <th>Member Surname</th>
                <th>Member ID</th>
                <th>Submission Date</th>
                <th>Captured By</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
        @foreach ($approvedApps as $apps)
        @if($apps->status == 1)
            <tr style="font-size: 12px;">
                <td>{{ $apps->main_firstname }}</td>
                <td>{{ $apps->main_surname }}</td>
                <td>{{ $apps->mainid_number }}</td>
                <td>{{ $apps->created_at }}</td>
                <td>{{ $apps->capturedby }}</td>
                <td><a href="#"><i class="fa fa-check fa-lg complete-action"></i> Approved</a></td>
            </tr>
            @else
            <tr>
            <td>{{ $apps->main_firstname }}</td>
                <td>{{ $apps->main_surname }}</td>
                <td>{{ $apps->mainid_number }}</td>
                <td>{{ $apps->created_at }}</td>
                <td>{{ $apps->capturedby }}</td>
                <td><a href="#"><i class="fa fa-times-circle fa-lg action"></i> Error</a></td>
            </tr>
            @endif
            @endforeach
            </tbody>
        </table>
        <div class="col sm-8">
            <a href="#" class="btn disabled btn-bonitas-tertiary btn-individual">
                MEMBER CERTIFICATE
            </a>
            <a href="{{url('/grp-pdf-copy/'.$apps->user_id)}}" class="btn btn-bonitas-view btn-individual">
                VIEW PDF
            </a>
            @if($apps->status == 1)
            
            <a href="{{url('/mail-copy/'.$apps->user_id)}}" class="btn btn-bonitas-view btn-individual">
                EMAIL COPY TO MEMBER
            </a>
            <a href="#" class="btn btn-bonitas-view btn-position disabled btn-individual">
                EDIT APPLICATION
            </a>
            @else
            <a href="#" class="btn btn-bonitas-view disabled btn-individual">
                EMAIL COPY TO MEMBER
            </a>
            <a href="{{url('edit-group/'.$apps->user_id)}}" class="btn btn-bonitas-view btn-position btn-individual">
                EDIT APPLICATION
            </a>
            @endif
        </div>
    </div>

    <div class="col sm-12" style="border-top: 10px;">
        <h4 class="headings" style="color:#ba0c35">Additional detatails</h4>
    </div>
    <div class="row">
    <hr class="horizontzl_line mb-3" style="width:90%;">
        @if($apps->status == 1)
            <p style="margin-top: 20px; margin-left: 65px; color: green; font-weight: bold;">Application Status : OK</p>
            <p style="margin-top: 3px; margin-left: 65px; color: green; font-weight: bold;">Reference ID : {{ $apps->reference_id }}</p>
            <p style="margin-top: 3px; margin-left: 65px; color: green; font-weight: bold;">Membership Number : {{ $apps->membership_num }}</p>
        @elseif($apps->status == -1)
            <p style="margin-top: 20px; margin-left: 65px; color: red; font-weight: bold;">Application Status : ERROR</p>
            <p style="margin-top: 3px; margin-left: 65px; color: red; font-weight: bold;">Error Code : {{ $apps->errorcode }}</p>
            <p style="margin-top: 3px; margin-left: 65px; color: red; font-weight: bold;">Error Message : {{ $apps->errormessage }}</p>
        @else
            <p style="margin-top: 20px; margin-left: 65px; color: orange; font-weight: bold;">Application Status : Application in Progress</p>
            
        @endif
    </div>
</div>
@endsection