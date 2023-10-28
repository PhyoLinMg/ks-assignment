<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([
	'middleware' => 'auth:sanctum'
], function() {
	//API Routes that needed to be authenticated
    Route::put('v1/user',[UserController::class,'updateUserInfo']);
});

Route::get('v1/contacts',[ContactController::class, 'getContacts']);
Route::get('v1/payments',[PaymentController::class, 'getPaymentList']);
Route::get('v1/doctors',[DoctorController::class, 'index']);
Route::get('v1/doctors/{id}',[DoctorController::class,'show']);
Route::get('v1/appointments',[AppointmentController::class, 'getAppointments']);
Route::get('v1/appointments/{id}',[AppointmentController::class, 'getSpecificAppointment']);
Route::post('v1/appointment',[AppointmentController::class,'createAppointment']);
Route::post('v1/appointments/cancel',[AppointmentController::class,'cancelAppointment']);
Route::post('v1/login',[UserController::class,'login']);
Route::post('v1/register',[UserController::class,'register']);




