<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ReportType extends Enum
{
    const ZoneReport = "ZoneReport";
    const PatientReport = "PatientReport";
    const NurseReport = "NurseReport";
}
