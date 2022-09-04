
@extends('hub.hub_layout')
@section('content')
<!-- BEGIN: Page Main-->
<?php 
    $forms = DB::table('pdf_forms')
                    ->limit(4)
                    ->get();
    $images = DB::table('marketing_elements')
                    ->get();
    $sliders = DB::table('sliders')
                    ->get();
?>
<div id="main">
    <div class="row">   
      <div class="col sm-8">
        <h4 class="elements">Marketing Elements</h4>
      </div>
      <div class="col sm-12">
            <div class="marketing-banner">
                <img src="{{asset('frontend/images/bonitas_assets/Hub_Banner-May_2022.png')}}" alt="" class="marketing-image">
            </div>
        </div>
    </div>
    <hr class="horizontal_line">
    <div class="col sm-12 table">
        <table class="striped">
            <thead>
            <tr>
                <th colspan='4' id="table-header"> documents</th>
            </tr>
            </thead>
            <tbody>
            @foreach($forms as $form)
            <tr style="height:2px;">
                <td>{{ $form->file_name }}</td>
                <td class="complete-action td-col"><a href="{{url($form->file_path)}}" target="_blank" style="color: #ba0c35; font-weight: bold;">View</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <hr class="horizontal_line">
    <div class="col sm-8">
        <h4 class="headings">Plan Brochure</h4>
        <div class="col-2 snaps">
            <span>
            @foreach($images as $image)
                <img src="{{asset($image->image_path)}}" style="width: 262px; height: 185px;" alt="" class="brochure-img">
            @endforeach
            </span>
        </div>
    </div>
    <div class="col sm-8">
        <h4 class="headings">Plan usp video</h4>
        <div class="row">
            <div class="container">
                <section class="logo-carousel slider" data-arrows="true">
                @foreach($sliders as $slider)
                    <div class="slide"><iframe width="240" height="auto" src="{{ URL::to($slider->video_link) }}"></iframe></div>
                @endforeach
                </section>
            </div>
        </div>
    </div>
    <div class="col sm-12 table">
        <table class="striped">
            <thead>
            <tr>
                <th colspan='4' id="table-header"> other elements</th>
            </tr>
            </thead>
            <tbody>
            @foreach($forms as $form)
            <tr style="height:2px;">
                <td>{{ $form->file_name }}</td>
                <td class="complete-action td-col"><a href="{{url($form->file_path)}}" target="_blank" style="color: #ba0c35; font-weight: bold;">View</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection