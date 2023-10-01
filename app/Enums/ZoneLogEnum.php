<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ZoneLogEnum extends Enum
{
    const PatientDesignated = "PatientDesignated";
    const PatientDispatched = "PatientDispatched";
    const CallStarted = "CallStarted";
    const CallChanged = "CallChanged";
    const CallSolved = "CallSolved";
}
