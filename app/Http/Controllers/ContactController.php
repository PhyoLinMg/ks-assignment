<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function getContacts(){
        $data=[];
        $contacts=Contact::all();
        foreach($contacts as $key=>$contact){
            $data["data"][$key]=[
                'type'=>$contact->contactType->type,
                'value'=>$contact->value,
            ];
        }

        return response()->json($data);
    }
}
