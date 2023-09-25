<?php

use App\Http\Controllers\RoutingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(RoutingController::class)->group(function () {
    Route::get('/', 'home')->name('home')->middleware('auth:sanctum','web');
    Route::get('/call', 'call')->middleware('otpVerification');
    Route::post('/call', 'call')->middleware('otpVerification');
    Route::get('/chats', 'chat')->name('chats')->middleware('auth:sanctum','web');
    Route::get('/zone/{zoneId}', 'zone')->middleware('auth:sanctum','web');
});

Route::prefix('internal')->group(function () {
    Route::get('/user/export', [RoutingController::class, 'userExport']);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'web'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/download', function () {
        return view('download');
    })->name('download');

    Route::get('/document/userResume/{id}',function (string $id){
        return view('presets.userResume', ["id" => intval($id)]);
    });
    Route::get('/document/callResume/{id}',function (string $id){
        return view('presets.userResume', ["id" => intval($id)]);
    });
});
