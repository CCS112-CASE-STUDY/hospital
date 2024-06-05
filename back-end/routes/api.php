<?php

use App\Http\Controllers\MedicalRecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return $request->user();
});

Route::post('/medicalRecords/add', [MedicalRecordController::class, 'addMedicalRecords']);
Route::put('/medicalRecords/{id}/edit', [MedicalRecordController::class, 'editMedicalRecords']);
Route::get('/medicalRecords/{patient_id}/records', [MedicalRecordController::class, 'showMedicalRecords']);
