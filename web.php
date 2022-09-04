<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forgot-pass', 'AuthController@forgot_password');
Route::post('/login', 'AuthController@login');
Route::get('/otp-verify', 'AuthController@otp_verify');
Route::get('/email-send', 'AuthController@send_email');
Route::post('/verify-otp','AuthController@verify_otp');
Route::post('/pass-reset', 'AuthController@reset_password');
Route::get('/reset-password/{token}','AuthController@change_pass');
Route::post('/new-password','AuthController@new_pass');


//Admin related routes
Route::get('/admin-dashboard', 'AdminController@admin_dashboard');
Route::get('/view-user/{id}', 'AdminController@view_user');
Route::get('edit-user/{id}','AdminController@edit_user');
Route::post('/update-user/{id}', 'AdminController@update_user');
Route::post('/change-password/{id}', 'AdminController@update_pass');
Route::get('/pdf-upload', 'AdminController@pdf_upload');
Route::get('/add-users','AdminController@add_users');
Route::post('/save-user', 'AdminController@save_user');
Route::post('/upload-pdf', 'AdminController@upload_pdf');
Route::get('/view-pdf','AdminController@view_pdf');
Route::get('/marketing-upload','AdminController@marketing_upload');
Route::post('/upload-image', 'AdminController@save_image');
Route::get('/view-marketing-elements', 'AdminController@view_marketing_elements');
Route::get('/slider','AdminController@add_slider');
Route::post('/upload-slider','AdminController@upload_slider');
Route::get('/view-sliders','AdminController@view_sliders');
Route::get('/delete-file/{file_id}','AdminController@delete_file');
Route::get('/delete-image/{image_id}','AdminController@delete_marketing_element');
Route::get('/delete-slider/{slider_id}','AdminController@delete_slider');


//Brokerage Related Routes
Route::get('add-broker', 'BrokerageController@add_broker');
Route::post('save-broker', 'BrokerageController@save_broker');
Route::get('edit-broker/{id}', 'BrokerageController@edit_broker');
Route::post('update-broker/{id}', 'BrokerageController@update_broker');
Route::get('delete-broker/{id}', 'BrokerageController@delete_broker');
Route::get('brokerage-view', 'BrokerageController@brokerage_view');
Route::get('broker-submitted', 'BrokerageController@broker_submitted');
Route::get('month-value', 'BrokerageController@get_month')->name('month');

//Hub Related routes
Route::get('/hub-home', 'HubController@hub_home');
Route::get('/hub-fedhome', 'HubController@hub_fedhome');
Route::get('/group-home', 'HubController@group_home');
Route::get('/dashboard', 'HubController@dashboard');
Route::get('/marketing-elements', 'HubController@marketing_elements');
Route::get('/query', 'HubController@query');
Route::get('/my-account/{id}', 'HubController@account');
Route::post('/edit-account/{id}', 'HubController@edit_account');
Route::post('/reset-password/{id}', 'HubController@change_password');
Route::get('/view-submitted/{user_id}','HubController@view_submitted');
Route::get('/view-submitted-group/{user_id}','HubController@view_submitted_group');
Route::get('/mail-copy/{user_id}','HubController@email_copy');
Route::get('/preview','HubController@preview');
Route::get('/create-pdf-copy/{user_id}','HubController@create_pdf');
Route::get('/individual-form','HubController@individual_form');
Route::get('/fed-individual','HubController@fed_individual');
Route::get('/group', 'HubController@group');
Route::get('/fedDashboard', 'HubController@fedDashboard');
Route::get('/form','HubController@test');
Route::get('/all-submitted','HubController@all_submitted');
Route::get('month', 'HubController@get_month')->name('month');
Route::get('/edit-application/{user_id}', 'HubController@edit_application');
Route::get('/fed-edit-application/{user_id}', 'HubController@fed_edit_application');
Route::get('/edit-group/{user_id}', 'HubController@edit_group');
Route::get('/signin/{email}','AuthController@single_signon'); 
//Auth Related routes
Route::get('/logout', 'AuthController@logout');


//Group Docs Related Controller
Route::get('/group-preview','GroupdocsController@group_preview');
Route::get('/group-create-pdf-copy/{user_id}','GroupdocsController@group_create_pdf');
// Delete Routes
Route::get('/delete-pending/{user_id}', 'HubController@delete_pending');
Route::get('/delete-additional/{user_id}', 'HubController@delete_additional');
Route::get('/grp-delete-pending/{user_id}','HubController@grp_delete_pending');
Route::get('/grp-delete-additional/{user_id}','HubController@grp_delete_additional');
// delete fedhealth Routes
Route::get('/fed-delete-pending/{user_id}', 'HubController@fed_delete_pending');
Route::get('/fed-delete-additional/{user_id}', 'HubController@fed_delete_additional');

//PDF Download Routes
Route::get('/pdf-copy/{member_num}', 'HubController@pdf_download');
Route::get('/grp-pdf-copy/{member_num}', 'HubController@pdf_download_grp');
// 
// Route::get('/getpracticeNum/{name}' ,'HubController@getpracticeNum');



