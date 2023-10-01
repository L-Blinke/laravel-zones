<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('zone', 'ZoneCrudController');
    Route::get('/edit-app-info', function () {
        return view('app-config');
    })->name('app-config');
    Route::crud('otp-code', 'OtpCodeCrudController');
    Route::crud('pathologies', 'PathologyCrudController');
    Route::crud('pathology-type', 'PathologyTypeCrudController');
    Route::crud('clinical-log', 'ClinicalLogCrudController');
    Route::crud('medical-insurance', 'MedicalInsuranceCrudController');
    Route::crud('preferences', 'PreferencesCrudController');
}); // this should be the absolute last line of this file