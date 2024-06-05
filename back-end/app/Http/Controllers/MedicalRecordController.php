<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicalRecordController extends Controller
{
    public function addMedicalRecords(Request $request)
    {
        // validate inputs
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|integer',
            'doctor_id' => 'required|integer',
            'visit_date' => 'required|date',
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
            'notes' => 'required|string'
        ]);

        if ($validator->fails()) {
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ]);
            }
        }

        // add medical records
        $medicalRecords = new MedicalRecord();
        $medicalRecords->patient_id = $request->patient_id;
        $medicalRecords->doctor_id = $request->doctor_id;
        $medicalRecords->visit_date = $request->visit_date;
        $medicalRecords->diagnosis = $request->diagnosis;
        $medicalRecords->treatment = $request->treatment;
        $medicalRecords->notes = $request->notes;
        $medicalRecords->save();

        return response()->json([
            'status' => 201,
            'message' => 'Medical Record successfully created.'
        ]);
    }

    public function editMedicalRecords(Request $request, $id)
    {
        $medicalRecords = MedicalRecord::find($id);

        if (!$medicalRecords) {
            return response()->json([
                'status' => 404,
                'message' => 'Medical Record not found'
            ]);
        }

        // validate inputs
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|integer',
            'doctor_id' => 'required|integer',
            'visit_date' => 'required|date',
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
            'notes' => 'required|string'
        ]);

        if ($validator->fails()) {
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ]);
            }
        }

        // add medical records
        $medicalRecords->patient_id = $request->patient_id;
        $medicalRecords->doctor_id = $request->doctor_id;
        $medicalRecords->visit_date = $request->visit_date;
        $medicalRecords->diagnosis = $request->diagnosis;
        $medicalRecords->treatment = $request->treatment;
        $medicalRecords->notes = $request->notes;
        $medicalRecords->save();

        return response()->json([
            'status' => 200,
            'message' => 'Medical Record successfully updated.'
        ]);
    }

    public function showMedicalRecords($patient_id)
    {
        $medicalRecords = MedicalRecord::where('patient_id', $patient_id)->get();

        if (!$medicalRecords) {
            return response()->json([
                'status' => 404,
                'message' => 'Medical Record not found'
            ]);
        }

        return response()->json([
            'status' => 200,
            'medicalRecords' => $medicalRecords
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalRecord $medicalRecord)
    {
        //
    }
}
