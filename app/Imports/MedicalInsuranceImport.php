<?php

namespace App\Imports;

use App\Models\MedicalInsurance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MedicalInsuranceImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return MedicalInsurance|null
     */
    public function model(array $row)
    {
        if ($row['medical_insurance_name'] !== null) {
            $medicalInsurance = new MedicalInsurance;$medicalInsurance->name = $row['medical_insurance_name'];$medicalInsurance->save();
        }
    }
}
