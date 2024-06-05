<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

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

// Doctor
Route::get('/doctor_list', [DoctorController::class, 'doctorList']);
Route::post('/doctor/add', [DoctorController::class, 'addDoctor']);
Route::put('/doctor/{doctorId}/edit', [DoctorController::class, 'editDoctor']);
Route::delete('/doctor/{doctorId}/remove', [DoctorController::class, 'removeDoctor']);
Route::get('/doctor/{email}', [UserController::class, 'displayDoctor']);
