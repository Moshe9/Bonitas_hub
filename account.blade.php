@extends('hub.hub_layout')
@section('content')
@foreach($details as $detail)
    
@endforeach
<div id="main">
    <div class="row">
                  
      <div
        class="content-wrapper-before  gradient-45deg-indigo-purple ">
      </div>
            

            
      <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
  <!-- Search for small screen-->
  <div class="container">
    <div class="row">
      <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title mt-0 mb-0"><span>My Account edit </span></h5>
                
              </div>
    </div>
  </div>
</div>
            <div class="col s12">
        <div class="container">
          
          <!-- users edit start -->
<div class="section users-edit">
  <div class="card">
    <div class="card-content">
      <!-- <div class="card-body"> -->
      <ul class="tabs mb-2 row">
        <li class="tab">
          <a class="display-flex align-items-center active" id="account-tab" href="#account">
            <i class="material-icons mr-1">person_outline</i><span>Account</span>
          </a>
        </li>
        <li class="tab">
          <a class="display-flex align-items-center" id="information-tab" href="#information">
            <i class="material-icons mr-2">lock_outline</i><span>Password Change</span>
          </a>
        </li>
      </ul>
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
                    <i class="material-icons">error</i> DANGER : {{ Session::get('fail')}}</p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
      <div class="divider mb-3"></div>
      <div class="row">
        <div class="col s12 mb-2" id="account">
          <!-- users edit media object start -->
          <div class="media display-flex align-items-center mb-2">
            <a class="mr-2" href="#">
              <img src="{{asset($detail->image)}}" alt="users avatar" class="z-depth-4 circle"
                height="64" width="64">
            </a>
            <div class="media-body">
              <h5 class="media-heading mt-0">Avatar</h5>
              <div class="user-edit-btns display-flex">
                <a href="#" class="btn-small btn-bonitas" disabled>Change</a>
                {{-- <a href="#" class="btn-small btn-light-pink">Reset</a> --}}
              </div>
            </div>
          </div>
          <!-- users edit media object ends -->
          <!-- users edit account form start -->
          <form id="accountForm" action="{{url('/edit-account/'.$detail->id)}}" method="post">
          @csrf
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <div class="col s12 input-field">
                    <input id="username" name="brokercode" type="text" class="validate" value="{{ $detail->brokercode }}"
                      data-error=".errorTxt1">
                    <label for="username">brokercode</label>
                    <small class="errorTxt1"></small>
                  </div>
                  <div class="col s12 input-field">
                    <input id="name" name="firstname" type="text" class="validate" value="{{ $detail->firstname}}"
                      data-error=".errorTxt2">
                    <label for="name">First Name</label>
                    <small class="errorTxt2"></small>
                  </div>
                  <div class="col s12 input-field">
                    <input id="email" name="email" type="email" class="validate" value="{{ $detail->email }}"
                      data-error=".errorTxt3">
                    <label for="email">E-mail</label>
                    <small class="errorTxt3"></small>
                  </div>
                </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  <div class="col s12 input-field">
                    <input id="company" name="phone" type="text" class="validate" value="{{ $detail->phone }}">
                    <label for="phone">Phone</label>
                  </div>
                  <div class="col s12 input-field">
                    <input id="company" name="lastname" type="text" class="validate" value="{{ $detail->lastname }}">
                    <label for="phone">Lastname</label>
                  </div>
                </div>
              </div>
              <div class="col s12 display-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-bonitas">
                  Save changes</button>
              </div>
            </div>
          </form>
          <!-- users edit account form ends -->
        </div>
        <div class="col s12" id="information">
          <!-- users edit Info form start -->
          <form id="infotabForm" action="{{ url('/reset-password/'.$detail->id)}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <div class="col s12">
                    <h6 class="mb-2"><i class="material-icons mr-1">lock_outline</i>Change your Password</h6>
                  </div>
                  <div class="col s12 input-field">
                    <input class="validate" type="password" name="old_password">
                    <label>Old Password</label>
                  </div>
                  <div class="col s12 input-field">
                    <input class="validate" type="password" name="new_password">
                    <label>New Password</label>
                  </div>
                  <div class="col s12 input-field">
                    <input class="validate" type="password" name="confirm_password">
                    <label>Confirm Password</label>
                  </div>
                </div>
              </div>
              {{-- <div class="col s12 m6">
                <div class="row">
                  <div class="col s12">
                    <h6 class="mb-4"><i class="material-icons mr-1">person_outline</i>Change your avatar</h6>
                  </div>
                    <div class="col s12 m8 l9">
                        <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="" />
                    </div>
                </div>
              </div> --}}
              <div class="col s12 display-flex justify-content-end mt-1">
                <button type="submit" class="btn btn-bonitas">
                  Save changes</button>
              </div>
            </div>
          </form>
          <!-- users edit Info form ends -->
        </div>
      </div>
      <!-- </div> -->
    </div>
  </div>
</div>
<!-- users edit ends -->
    
<!-- END RIGHT SIDEBAR NAV -->                    
</div>
        
        <div class="content-overlay"></div>
      </div>
    </div>
  </div>
@endsection
