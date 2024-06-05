<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doctorList()
    {
        $doctors = Doctor::all();

        return response()->json([
            'status' => 200,
            'data' => $doctors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addDoctor(Request $request)
    {
        // Define validation rules
        $rules = [
            'email' => 'required|email:rfc,dns'
           
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, return a response with errors
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ]);
        }
    
        $doctor = new Doctor();
        $doctor->first_name = $request->first_name;
        $doctor->last_name= $request->last_name;
        $doctor->specialization = $request->specialization;
        $doctor->license_number= $request->license_number;
        $doctor->phone = $request->phone;
        $doctor->email = $request->email;
        $doctor->save();

        return response()->json([
            'status' => 200,
            'message' => 'Doctor added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function displayDoctor(Request $request)
    {
        $doctor = User::where('email', $request->email)->first();

        if (!$doctor) {
            return response()->json([
                'status' => 404,
                'message' => 'Doctor is not yet registered'
            ]);
        }

        return response()->json([
            'status' => 200,
            'doctor' => $doctor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editDoctor(Request $request, $id)
    {
        $doctor= Doctor::find($id);

        if (!$doctor) {
            return response()->json([
                'status' => 404,
                'message' => 'Doctor is not yet registered'
            ]);
        }
        $doctor->first_name = $request->first_name;
        $doctor->last_name= $request->last_name;
        $doctor->specialization = $request->specialization;
        $doctor->license_number= $request->license_number;
        $doctor->phone = $request->phone;
        $doctor->email = $request->email;
        $user->save();

        return response()->json([
            'status' => 201,
            'message' => 'Doctor Information updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeDoctor($id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return response()->json([
                'status' => 404,
                'message' => 'doctor not found'
            ]);
        }

        $doctor->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Doctor removed successfully'
        ]);
    }
}
