<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    //
    public function getAppointments(){
        //Now not using pagination...
        // u can enhance it as v2
        $data=[];
        $appointments=Appointment::all();
        foreach($appointments as $key=>$appointment){
            $data["data"][$key]=[
                'username'=>$appointment->user->name,
                'doctorname'=>$appointment->doctor->name,
                'payment'=> $appointment->paymentType->name,
            ];
        }

        return response()->json($data);
    }

    public function getSpecificAppointment($id){
        $appointment=Appointment::find($id);
        $data=[
            'username'=>$appointment->user->name,
            'doctorname'=>$appointment->doctor->email,
            'payment'=>$appointment->paymentType->name
        ];
        return response()->json($data);
    }

    public function createAppointment(Request $request){

        //request will be needed user_id, doctor_id, and payment_type_id

        return Appointment::firstOrCreate([
            'doctor_id'=> $request->doctorId,
            'user_id'=> $request->userId,
            'payment_type_id'=> $request-> paymentTypeId
        ]);
    }

    public function cancelAppointment(Request $request){
        $data= Appointment::destroy($request->id); 
        return response->json(["code"=>$data, "status"=>""]);
    }
}
