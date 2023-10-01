<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClinicalLog;
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

        return view('presets.userResume', ["data" => $data, "extensive_url" => "internal/document/userResume/".$id]);
    }

    public function downloadUserResume()
    {
        return Browsershot::url('http://localhost:8000/internal/document/userResume/4')->pdf();
    }
}
