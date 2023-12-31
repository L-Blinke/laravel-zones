<?php

use App\Http\Controllers\RoutingController;
use App\Http\Controllers\DocumentationController;
use Illuminate\Support\Facades\Route;

Route::controller(RoutingController::class)->middleware(['auth:sanctum','web'])->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/chats', 'chat')->name('chats');
    Route::get('/zone/{zoneId}', 'zone');

    Route::get('/makeCallButton', 'makeCallButton');
    Route::get('/solveCallButton', 'solveCallButton');
    Route::get('/asignNewPatient', 'asignNewPatient');
    Route::get('/dispatchPatient', 'dispatchPatient');
});

Route::prefix('api')->controller(RoutingController::class)->middleware(['otpVerification'])->group(function () {
    Route::get('/call/make', 'call');
    Route::post('/call/make', 'call');
    Route::get('/call/solve', 'solveCall');
    Route::post('/call/solve', 'solveCall');
    Route::get('/call/asign', 'asign');
    Route::post('/call/asign', 'asign');
    Route::get('/call/dispatch', 'dispatch');
    Route::post('/call/dispatch', 'dispatch');
    Route::get('/call/diagnose', 'diagnose');
    Route::post('/call/diagnose', 'diagnose');
});

Route::prefix('internal')->middleware(['auth:sanctum','web'])->controller(RoutingController::class)->group(function () {
    Route::get('/users/export', 'usersExport');
    Route::get('/clinical-logs/export', 'clinicalLogsExport');
    Route::get('/pathologies/export', 'pathologiesExport');
    Route::get('/pathology-types/export', 'pathologyTypesExport');
    Route::get('/medical-insurances/export', 'medicalInsurancesExport');

    Route::get('/users/import', 'usersImport');
    Route::get('/clinical-logs/import', 'clinicalLogsImport');
    Route::get('/pathologies/import', 'pathologiesImport');
    Route::get('/pathology-types/import', 'pathologyTypesImport');
    Route::get('/medical-insurances/import', 'medicalInsurancesImport');
});

Route::prefix('internal')->middleware(['auth:sanctum','web'])->controller(DocumentationController::class)->group(function (){
    Route::get('/document/patientResume/{id}', 'userResume');
    Route::get('/document/nurseResume/{id}', 'nurseResume');
    Route::get('/document/callResume/{id}', 'callResume');
    Route::get('/document/userResumeDownload/{id}', 'downloadUserResume');
});
