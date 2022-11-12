<?php

use App\Http\Controllers\Appoinment\AppoinmentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Setup\CountryController;
use App\Http\Controllers\Setup\DeskController;
use App\Http\Controllers\Setup\EmployeeController;
use App\Http\Controllers\Setup\MissionController;
use App\Http\Controllers\Setup\ScheduleController;

use App\Http\Controllers\Tracking\LtrackingStatusController;
use App\Http\Controllers\Tracking\LtrackingTypeController;
use App\Http\Controllers\Tracking\RegisterNewRequestController;
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
    return view('frontend.home');
});

Route::get('send-basic-email/{id}',[MailController::class, 'send_email'])->name('send_mail');

//Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::group(['name' => 'frontend', 'as' => 'frontend.'], function () {
    Route::get('mission', [FrontendController::class, 'index'])->name('index');
    Route::get('tracking', [FrontendController::class, 'tracking'])->name('tracking');
    Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
    Route::post('get-mission', [FrontendController::class, 'getmissionAjax'])->name('get-mission');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['name' => 'user', 'as' => 'user.'], function () {
    Route::get('user-create', [RegisterController::class, 'index'])->name('index');
    Route::POST('user-store', [RegisterController::class, 'create'])->name('create');
    Route::get('user-datatable', [RegisterController::class, 'datatable'])->name('datatable');
    Route::get('user-edit/{id}', [RegisterController::class, 'inactive'])->name('inactive');
    Route::get('mail-send/{id}', [RegisterController::class, 'mailSend'])->name('mail_send');
    Route::post('get-mission-ajax', [RegisterController::class, 'getMissionAjax'])->name('get-mission-ajax');
    Route::get('user-profile', [UserProfileController::class, 'index'])->name('profile-index');
    Route::post('change-user-password', [UserProfileController::class, 'updatePassword'])->name('change_password');


});


Route::group(['name' => 'mission', 'as' => 'mission.'], function () {
    Route::get('mission-entry', [MissionController::class, 'index'])->name('index');
    Route::POST('mission-store', [MissionController::class, 'store'])->name('store');
    Route::get('mission-datatable', [MissionController::class, 'datatable'])->name('datatable');
    Route::get('mission-edit/{id}', [MissionController::class, 'edit'])->name('edit');
    Route::put('mission-update/{id}', [MissionController::class, 'update'])->name('update');
    Route::get('mission-destroy/{id}', [MissionController::class, 'destroy'])->name('destroy');

});

Route::group(['name' => 'country', 'as' => 'country.'], function () {
    Route::get('country-entry', [CountryController::class, 'index'])->name('index');
    Route::POST('country-store', [CountryController::class, 'store'])->name('store');
    Route::get('country-datatable', [CountryController::class, 'datatable'])->name('datatable');
    Route::get('country-edit/{id}', [CountryController::class, 'edit'])->name('edit');
    Route::put('country-update/{id}', [CountryController::class, 'update'])->name('update');
    Route::get('country-destroy/{id}', [CountryController::class, 'destroy'])->name('destroy');

});

Route::group(['name' => 'schedule', 'as' => 'schedule.'], function () {
    Route::get('schedule-entry', [ScheduleController::class, 'index'])->name('index');
    Route::POST('schedule-store', [ScheduleController::class, 'store'])->name('store');
    Route::get('schedule-datatable', [ScheduleController::class, 'datatable'])->name('datatable');
    Route::post('schedule-country', [ScheduleController::class, 'getCountryAjax'])->name('get-country');
    Route::get('schedule-edit/{id}', [ScheduleController::class, 'edit'])->name('edit');
    Route::put('schedule-update/{id}', [ScheduleController::class, 'update'])->name('update');

});
Route::group(['name' => 'desk', 'as' => 'desk.'], function () {
    Route::get('desk-assign', [DeskController::class, 'index'])->name('index');
    Route::POST('desk-assign-store', [DeskController::class, 'store'])->name('store');
    Route::get('desk-assign-datatable', [DeskController::class, 'datatable'])->name('datatable');
    Route::get('desk-assign-edit/{id}', [DeskController::class, 'edit'])->name('edit');
    Route::put('desk-assign-update/{id}', [DeskController::class, 'update'])->name('update');

});


Route::group(['name' => 'appoinment', 'as' => 'appoinment.'], function () {

    Route::get('appointment-list', [AppoinmentController::class, 'index'])->name('index');
    Route::get('appointment-data', [AppoinmentController::class, 'get_appointment_data'])->name('export');
    Route::get('reports', [AppoinmentController::class, 'reports'])->name('reports');
});

//Tracking start

Route::group(['name' => 'tracking-type', 'as' => 'tracking-type.'], function () {
    Route::get('tracking-type', [LtrackingTypeController::class, 'index'])->name('index');
    Route::POST('tracking-type-store', [LtrackingTypeController::class, 'store'])->name('store');
    Route::get('tracking-type-datatable', [LtrackingTypeController::class, 'datatable'])->name('datatable');
    Route::get('tracking-type-edit/{id}', [LtrackingTypeController::class, 'edit'])->name('edit');
    Route::put('tracking-type-update/{id}', [LtrackingTypeController::class, 'update'])->name('update');
    Route::get('tracking-type-destroy/{id}', [LtrackingTypeController::class, 'destroy'])->name('destroy');
});
Route::group(['name' => 'tracking-status', 'as' => 'tracking-status.'], function () {
    Route::get('tracking-status', [LtrackingStatusController::class, 'index'])->name('index');
    Route::POST('tracking-status-store', [LtrackingStatusController::class, 'store'])->name('store');
    Route::get('tracking-status-datatable', [LtrackingStatusController::class, 'datatable'])->name('datatable');
    Route::get('tracking-status-edit/{id}', [LtrackingStatusController::class, 'edit'])->name('edit');
    Route::put('tracking-status-update/{id}', [LtrackingStatusController::class, 'update'])->name('update');
    Route::get('tracking-status-destroy/{id}', [LtrackingStatusController::class, 'destroy'])->name('destroy');
});
Route::group(['name' => 'request-new-user', 'as' => 'request-new-user.'], function () {
    Route::get('request-new-user', [RegisterNewRequestController::class, 'index'])->name('index');
    Route::get('request-new-user-create', [RegisterNewRequestController::class, 'create'])->name('create');
    Route::POST('request-new-user-store', [RegisterNewRequestController::class, 'store'])->name('store');
//    Route::POST('tracking-status-store', [LtrackingStatusController::class, 'store'])->name('store');
//    Route::get('tracking-status-datatable', [LtrackingStatusController::class, 'datatable'])->name('datatable');
//    Route::get('tracking-status-edit/{id}', [LtrackingStatusController::class, 'edit'])->name('edit');
//    Route::put('tracking-status-update/{id}', [LtrackingStatusController::class, 'update'])->name('update');
//    Route::get('tracking-status-destroy/{id}', [LtrackingStatusController::class, 'destroy'])->name('destroy');
});





