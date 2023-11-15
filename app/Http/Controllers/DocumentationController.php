<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClinicalLog;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Spatie\Browsershot\Browsershot;

class DocumentationController extends Controller
{
    public function userResume(int $id){
        $user = User::find($id);
        if (ClinicalLog::where('user_id',$id)->exists()) {
            if (ClinicalLog::where('user_id',$id)->first()->pathologies()->exists()) {
                $info["Pathologies"] = ClinicalLog::where('user_id',$id)->first()->pathologies;
            }

            $info["Clinical-Log"] = ClinicalLog::where('user_id',$id)->first();
        }
        $info["user_id"] = $id;
        $info["Stay-Info"] = $user->stayInfo;
        $info["Stay-Events"] = $user->stayEvents;
        $data = ($user->privilege == "Patient") ? (collect($user))->merge($info) : $user;

        // return view('presets.userResume', ["data" => $data, "extensive_url" => "internal/document/userResume/".$id]);
        $pdf = PDF::loadView('presets.userResume', ["data" => $data, "extensive_url" => "internal/document/userResume/".$id]);
        $pdf->setOption('margin-left', 0);
        $pdf->setOption('margin-right', 0);
        $pdf->setPaper('a3');
        $pdf->setOption('enable-local-file-access', true);
        return $pdf->inline();
    }

    public function nurseResume(int $id){
        $user = User::find($id);
        $info["user_id"] = $id;
        $info["Stay-Info"] = $user->stayInfo;
        $info["Stay-Events"] = $user->stayEvents;
        $data = ($user->privilege == "Patient" || $user->privilege == "Nurse") ? (collect($user))->merge($info) : $user;

        // return view('presets.userResume', ["data" => $data, "extensive_url" => "internal/document/userResume/".$id]);
        $pdf = PDF::loadView('presets.nurseResume', ["data" => $data, "extensive_url" => "internal/document/nurseResume/".$id]);
        $pdf->setOption('margin-left', 0);
        $pdf->setOption('margin-right', 0);
        $pdf->setPaper('a3');
        $pdf->setOption('enable-local-file-access', true);
        return $pdf->inline();
    }

    public function downloadUserResume()
    {
        return Browsershot::url('http://localhost:8000/internal/document/userResume/4')->pdf();
    }
}
