<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Prescription;
use App\Http\Resources\AppointmentCollection;
use App\Http\Resources\AppointmentResource;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    //
    public function getAppointments(){
        //Now not using pagination...
        // u can enhance it as v2
        $appointment;
        $user=Auth::user();
        if($user->role==1){
            $appointment=Appointment::whereDate('created_at', Carbon::today())->paginate(5);
        } else {
            $appointment=Appointment::where('user_id',$user->id)->paginate(5);
        }
        return new AppointmentCollection($appointment);
    }
    
    public function getSpecificAppointment($id){
        $appointment=Appointment::findOrFail($id);
        
        return new AppointmentResource($appointment);
    }
    
    public function createAppointment(Request $request){
        $user=Auth::user();
        
        //request will be needed user_id, doctor_id, and payment_type_id
        
        return Appointment::firstOrCreate([
            'doctor_id'=> $request->doctorId,
            'user_id'=> $user->id,
            'payment_type_id'=> $request-> paymentTypeId
        ]);
    }
    
    public function cancelAppointment(Request $request){
        $data= Appointment::destroy($request->id); 
        return response()->json(["code"=>$data, "status"=>"Success"]);
    }

    public function addPrescription(Request $request){
        $user= Auth::user();
        
        if($user->role!=1) return response()->json([
            "message"=>"You don't have permission to "
        ],403);
        else {
            return Prescription::firstOrCreate([
                'medicine_id'=>$request->medicineId,
                'name'=> $request->name,
                'quantity'=> $request->quantity,
                'note'=>$request->note,
            ]);
        }
    }
}
