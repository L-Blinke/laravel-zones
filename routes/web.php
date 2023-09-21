<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\OtpCode;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'privileges'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/download', function () {
        return view('download');
    })->name('download');
    Route::get('/chats', function () {
        return view('chats');
    })->name('chats');
    Route::get('/zone/{zoneId}', function (int $zoneId) {
        return view('zone', ["zone" => $zoneId]);
    })->name('zone');
});

Route::get('/call', function (Request $request) {
    $otp = $request->input('p');
    $type = $request->input('t');

    foreach(OtpCode::pluck('passphrase')->toArray() as $pass){
        if (Otp::validate($pass, $otp)->status) {
            $call = new Call();
            $call->type = OtpCode::where('passphrase', '=', $pass)->get()->type;
            $call->zone_id = OtpCode::where('passphrase', '=', $pass)->get()->zone_id;
            $call->save();
        }
    }

    return 200;
});
Route::post('/call', function (Request $request) {
    $otp = $request->input('p');
    $type = $request->input('t');

    foreach(OtpCode::pluck('passphrase')->toArray() as $pass){
        if (Otp::validate($pass, $otp)->status) {
            $call = new Call();
            $call->type = OtpCode::where('passphrase', '=', $pass)->get()->type;
            $call->zone_id = OtpCode::where('passphrase', '=', $pass)->get()->zone_id;
            $call->save();
        }
    }

    return 200;
});
