<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();});

// UserController
Route::post('/user/add', [UserController::class, 'addUser']);
Route::put('/user/{id}/edit', [UserController::class, 'updateUser']);
Route::delete('/user/{id}/delete', [UserController::class, 'deleteUser']);
Route::post('/user/login', [UserController::class, 'loginUser']);
Route::get('user/patient/list', [UserController::class, 'getPatients']);
Route::get('user/doctor/list', [UserController::class, 'getDoctors']);
Route::get('user/receptionist/list', [UserController::class, 'getReceptionists']);

// Doctor
Route::get('/doctor_list', [DoctorController::class, 'doctorList']);
Route::post('/doctor/add', [DoctorController::class, 'addDoctor']);
Route::put('/doctor/{doctorId}/edit', [DoctorController::class, 'editDoctor']);
Route::delete('/doctor/{doctorId}/remove', [DoctorController::class, 'removeDoctor']);
Route::get('/doctor/{email}', [UserController::class, 'displayDoctor']);

//patient
Route::post('/patients', [PatientController::class, 'addPatient']);
Route::put('/patients/{id}/edit', [PatientController::class, 'editPatient']);
Route::delete('/patients/{id}/remove', [PatientController::class, 'deletePatient']);
Route::get('/patients/{id}/view', [PatientController::class, 'viewPatient']);
Route::get('/patients_list', [PatientController::class, 'patientList']);

// AppointmentController
Route::get('/appointment/list', [AppointmentController::class, 'listAppointments']);
Route::post('/appointment/book', [AppointmentController::class, 'bookAppointment']);
Route::get('/appointment/show', [AppointmentController::class, 'showAppointments']);
Route::put('/appointment/{id}/edit', [AppointmentController::class, 'updateAppointment']);
Route::put('/appointment/{id}/cancel', [AppointmentController::class, 'cancelAppointment']);

// MedicalRecordController
Route::get('/medicalRecord/list', [MedicalRecordController::class, 'getMedicalRecords']);
Route::post('/medicalRecord/add', [MedicalRecordController::class, 'addMedicalRecord']);
Route::put('/medicalRecord/{id}/edit', [MedicalRecordController::class, 'updateMedicalRecord']);
Route::get('/medicalRecord/{patient_id}/show', [MedicalRecordController::class, 'showMedicalRecords']);