<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function order(Request $request){
        return Order::firstOrCreate([
            'appointment_id'=>$request->appointmentId,
            'prescription_id'=> $request->prescriptionId,
        ]);
    }

    public function completeOrder(Request $request){
        //TODO: to complete the order, change the status to complete.
    }
}
