<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Call;
use App\Models\ClinicalLog;
use App\Models\OtpCode;
use App\Models\User;
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
        $info = OtpCode::find($request->input('i'));
        (Call::antiqueCalls() == true) ? Call::clearCallsAndStartCall($info->type,$info->zone_id): Call::StartCall($info->type,$info->zone_id);
    }

    public function solveCall(Request $request) : void{
        $otpCode = OtpCode::find($request->input('i'));
        Call::where('zone_id', $otpCode->zone_id)->where('type', $otpCode->type)->first()->solve(['resolutionStatus' => $request->input('s')]);
    }

    public function zone(int $id) {
        return view('zone', ["zone" => $id]);
    }

    public function chat() {
        return view('chat');
    }

    public function usersExport() {
        return response()->download(storage_path('app/public/tmp/users.xlsx'));
    }

    public function clinicalLogsExport() {
        return response()->download(storage_path('app/public/tmp/clinicalLogs.xlsx'));
    }

    public function pathologiesExport() {
        return response()->download(storage_path('app/public/tmp/pathologies.xlsx'));
    }

    public function pathologyTypesExport() {
        // return response()->download(storage_path('app/public/tmp/pathologyTypes.xlsx'));
    }

    public function medicalInsurancesExport() {
        return response()->download(storage_path('app/public/tmp/medicalInsurances.xlsx'));
    }

    public function usersImport() {
        return view('imports.userImport');
    }

    public function PathologiesImport() {
        return view('imports.pathologiesImport');
    }

    public function PathologyTypesImport() {
        return view('imports.pathologyTypesImport');
    }

    public function MedicalInsurancesImport() {
        return view('imports.medicalInsurancesImport');
    }

    public function ClinicalLogsimport() {
        return view('imports.clinicalLogsImport');
    }
}
