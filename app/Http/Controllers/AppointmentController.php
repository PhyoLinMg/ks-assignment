<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    //
    public function getAppointments(){
       return Appointment::paginate(5);
    }

    public function getSpecificAppointment($id){
        return Appointment::find($id);
    }

    public function createAppointment(Request $request){

    }

    public function cancelAppointment(Request $request){

    }
}
