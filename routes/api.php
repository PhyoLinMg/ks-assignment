<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;

// User
Route::post('v1/login',[UserController::class,'login']);
Route::post('v1/register',[UserController::class,'register']);
Route::group([
	'middleware' => 'auth:sanctum'
], function() {
    Route::put('v1/user',[UserController::class,'updateUserInfo']);
});

// Doctor
Route::get('v1/doctors',[DoctorController::class, 'index']);
Route::get('v1/doctors/{id}',[DoctorController::class,'show']);
//Route::delete('v1/doctors/{id}',[DoctorController::class,'delete']); missing
//Route::post('v1/doctors/',[DoctorController::class,'add']); missing
//Route::put('v1/doctors/{id}',[DoctorController::class,'update']); missing

// Appointment
/**
 * put below routes under auth group 
 */
Route::get('v1/appointments',[AppointmentController::class, 'getAppointments']); // if role is admin, return all today appointments otherwise return user appointment
Route::get('v1/appointments/{id}',[AppointmentController::class, 'getSpecificAppointment']);
Route::post('v1/appointment',[AppointmentController::class,'createAppointment']);
Route::post('v1/appointments/cancel',[AppointmentController::class,'cancelAppointment']);

// Prescription 

// Admin give Prescription for Appointment 
// Route::post('v1/addPrescription',[AppointmentController::class,'addPrescription']); 

// User Order [missing]
// Route::post('v1/order/',[AppointmentController::class,'order']); 
// Route::post('v1/order/{id}/complete',[AppointmentController::class,'order_complete']);
//
// Medicine missing  
// 

// Payment
Route::get('v1/payments',[PaymentController::class, 'getPaymentList']);

// Others
Route::get('v1/contacts',[ContactController::class, 'getContacts']);
Route::post('v1/feedback', [FeedbackController::class, 'store']);
Route::post('v1/getfeedback', [FeedbackController::class, 'feedback']);
