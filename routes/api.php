<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('v1/contacts',[ContactController::class, 'getContacts']);
Route::get('v1/payments',[PaymentController::class, 'getPaymentList']);
Route::get('v1/doctors',[DoctorController::class, 'index']);
Route::get('v1/doctors/{id}',[DoctorController::class,'show']);
Route::get('v1/appointments',[AppointmentController::class, 'getAppointments']);
Route::get('v1/appointments/{id}',[AppointmentController::class, 'getSpecificAppointment']);
