<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\OtpCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutingController extends Controller
{
    public function home() {
        switch (Auth::user()->privilege) {
            case 'Receptionist':
                return view('dashboard');
            case 'Nurse':
                return view('download');
            case 'Paramedic':
                return view('download');
            case 'Accountant':
                return redirect('/admin/');
            default:
                return abort(404);
        }
    }

    public function call(Request $request) : void{
        $call = new Call();
        $call->type = $request->input('t');
        $call->zone_id = $request->input('z');
        $call->save();
    }

    public function zone(int $id) {
        return view('zone', ["zone" => $id]);
    }

    public function chat() {
        return view('chat');
    }

    public function userResume(int $id){
        return view('presents.userResume', ["id" => $id]);
    }

    public function userExport() {
        return response()->download(storage_path('app/public/tmp/users.xlsx'));
    }

    public function userImport() {
        return view('presents.userResume');
    }
}
