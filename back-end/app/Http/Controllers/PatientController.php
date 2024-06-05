<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function addPatient(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'address' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email:rfc,dns'
        ]);

        $patient = Patient::create($request->all());

        return response()->json(['message' => 'Patient added successfully', 'data' => $patient], 201);
    }
    
    public function editPatient(Request $request, $id){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        return response()->json(['message' => 'Patient updated successfully', 'data' => $patient]);
    }

    public function deletePatient($id){
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully']);
    }

    public function viewPatient($id){
        $patient = Patient::findOrFail($id);
        return response()->json(['data' => $patient]);
    }

    public function patientList(){
        $patients = Patient::all();
        return response()->json([
            'status' => 200,
            'data' => $patients
        ]);
    }

}
