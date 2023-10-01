<?php

namespace App\Imports;

use App\Models\PathologyType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PathologyTypeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return PathologyType|null
     */
    public function model(array $row)
    {
        if ($row['pathology_name'] !== null) {
            $pathologyType = new PathologyType;$pathologyType->name = $row['pathology_name'];$pathologyType->save();
        }
    }
}
