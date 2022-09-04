@extends('hub.hub_layout')
@section('content')
<style>
body{
    background-color: #f6f6f6;
}
</style>
<div class="col sm-12" style="border-bottom: 300;">
    <h4 class="headings">System Support</h4>
</div>
<div class="col sm-12 centered-form">
    <form id="accountForm" action="{{url('/save-user')}}" method="post">
          @csrf
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <div class="col s12 input-field">
                    <input id="username" name="name" type="text" class="validate" data-error=".errorTxt1">
                    <label for="username">Name</label>
                    <small class="errorTxt1"></small>
                  </div>
                  <div class="col s12 input-field">
                    <input id="name" name="firstname" type="text" class="validate" data-error=".errorTxt2">
                    <label for="name">Broker Code</label>
                    <small class="errorTxt2"></small>
                  </div>
                  <div class="col s12 input-field">
                    <input id="email" name="email" type="text" class="validate" data-error=".errorTxt3">
                    <label for="email">Subject</label>
                    <small class="errorTxt3"></small>
                  </div>
                  <div class="col s12 input-field">
                    <input id="message" name="message" type="text" class="validate" data-error=".errorTxt3">
                    <label for="message">Message</label>
                    <small class="errorTxt3"></small>
                  </div>
                </div>
              </div>
              <div class="col s12 display-flex justify-content-end mt-3">
                <button type="submit" class="btn custom-btn-query">
                  Submit
                </button>
              </div>
            </div>
          </form>
</div>
@endsection
