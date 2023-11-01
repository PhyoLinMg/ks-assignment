<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

use App\Http\Resources\DoctorCollection;
use App\Http\Resources\DoctorResource;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new DoctorCollection(Doctor::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $doctor= Doctor::firstOrCreate([
          'name'=>$request->name,
          'degree'=>$request->degree,
          'biography'=> $request->biography
        ]);

        $doctor->save();
        //this request specialization is list of integer [1,2,3], they are the ids of specializations.
        $integerIDs = json_decode($request->specializationIds, true);
        if(!empty($request->specializationIds)) {
            $doctor->specializations()->attach($integerIDs);
        }
        return new DoctorResource($doctor);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $doctor= Doctor::find($id);
        return new DoctorResource($doctor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // in the ui... show everything and send everything back. 
        $doctor= Doctor::find($id);
        $doctor->name= $request->name;
        $doctor->biography= $request->biography;
        $doctor->degree= $request->degree;

        $doctor->save();

        return new DoctorResource($doctor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data= Doctor::destroy($id);
        return response()->json(["status"=>"Success"]);
    }


}
