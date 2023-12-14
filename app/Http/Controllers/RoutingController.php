<?php

namespace App\Http\Controllers;

use App\Enums\CallTypesEnum;
use Carbon\Carbon;
use App\Models\Call;
use App\Models\EmergencyRoom;
use App\Models\OtpCode;
use App\Models\User;
use App\Models\Pathology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutingController extends Controller
{
    public function home() {
        switch (Auth::user()->privilege) {
            case 'Receptionist':
                return view('dashboard');
            case 'Nurse':
                return redirect('/makeCallButton');
            case 'Paramedic':
                return view('dashboard');
            case 'Button':
                return redirect('/makeCallButton');
            default:
                return abort(404);
        }
    }

    public function call(Request $request){
        (EmergencyRoom::find($request->i)->antiqueCalls() == true) ? Call::clearCallsAndStartCall(CallTypesEnum::fromValue($request->t),$request->i, $request->r): Call::clearCallsAndStartCall(CallTypesEnum::fromValue($request->t),$request->i, $request->r);
        return redirect()->back();
    }

    public function solveCall(Request $request){
        $otpCode = OtpCode::find($request->input('i'));
        Call::where('zone_id', $request->input('i'))->where('completed_at', '=', null)->first()->solve($request->r);
        return redirect()->back();
    }
    public function asign(Request $request){
        $user = User::factory(1)->create()[0];
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->cuil = $request->cuil;
        $user->email = $request->email;
        $user->privilege = "Patient";
        $user->save();
        EmergencyRoom::find($request->input('i'))->asignPatient($user->id, $request->r);
        return redirect()->back();
    }

    public function dispatch(Request $request){
        EmergencyRoom::find($request->input('i'))->dispatchPatient($request->input('r'));
        return redirect()->back();
    }

    public function diagnose(Request $request)
    {
        $pathology = new Pathology;
        $pathology->clinical_log_id = $request->p;
        $pathology->pathology_type_id = $request->pathology;
        $pathology->save();
        return redirect()->back();
    }


    public function zone(int $id) {
        return view('zone', ["zone" => $id]);
    }

    public function makeCallButton(){
        return view('button');
    }

    public function solveCallButton(){
        return view('buttonSolve');
    }

    public function asignNewPatient(){
        return view('AsignPatient');
    }

    public function dispatchPatient(){
        return view('dispatchPatient');
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
