<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentType;

class PaymentController extends Controller
{
    //
    public function getPaymentList(){
        $data=[];
        $paymentTypes=PaymentType::all();
        foreach($paymentTypes as $key=>$paymentType){
            $data["data"][$key]=[
                'name'=>$paymentType->name,
                'description'=>$paymentType->description,
            ];
        }

        return response()->json($data);
    }
}
