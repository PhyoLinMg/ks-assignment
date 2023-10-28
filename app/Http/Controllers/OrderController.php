<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function order(Request $request){
        return Order::firstOrCreate([
            'order_id'=>$request->orderId,
            'prescription_id'=> $request->prescriptionId,
        ]);
    }

    public function completeOrder(Request $request){
            
    }
}
