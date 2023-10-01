<?php

namespace App\Imports;

use App\Models\ClinicalLog;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClinicalLogImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return ClinicalLog|null
     */
    public function model(array $row)
    {
        if ($row['patient_id'] !== null) {
            $clinicalLog = new ClinicalLog;
            $clinicalLog->user_id = $row['patient_id'];$clinicalLog->gender = $row['gender'];$clinicalLog->sex = $row['sex'];
            $clinicalLog->bornDate = $row['born_date'];$clinicalLog->age = $row['age'];$clinicalLog->address = $row['address'];
            $clinicalLog->phone = $row['phone_number'];$clinicalLog->bloodGroup = $row['blood_group'];
            $clinicalLog->medical_insurance_id = $row['medical_insurance_id'];$clinicalLog->emergencyPhone = $row['emergency_phone_number'];
            $clinicalLog->save();
        }
    }
}
