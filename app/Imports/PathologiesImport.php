<?php

namespace App\Imports;

use App\Models\Pathology;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PathologiesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Pathology|null
     */
    public function model(array $row)
    {
        if ($row['clinical_log_id'] !== null) {
            $pathologyType = new Pathology;$pathologyType->clinical_log_id = $row['clinical_log_id'];$pathologyType->pathology_type_id = $row['pathology_id'];$pathologyType->save();
        }
    }
}
