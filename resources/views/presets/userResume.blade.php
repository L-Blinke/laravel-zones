@php
    use Illuminate\Support\Collection;
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
    use Illuminate\Http\Request;
@endphp

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Right Resume</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"
        media="print" onload="this.media='all'" />
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" />
    </noscript>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body id="top">
    <div class="overflow-visible py-12">
        <div class="relative overflow-visible max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="cover shadow-lg bg-white">
                    <div class="bg-slate-200 p-3 p-lg-4">
                        @if ($data instanceof Collection)
                            <div class="row">
                                <div class="col-lg-4 col-md-5">
                                    <div class="avatar hover-effect bg-white shadow-sm p-1"><img
                                            src="{{ $data["profile_photo_url"] }}" width="200" height="200" /></div>
                                </div>
                                <div class="">
                                    <div class="pb-1">{{ $data["name"] }}</div>
                                    <div class="pb-1 text-secondary">{{ $data["surname"] }}</div>
                                    <div class="pb-1">{{ $data["privilege"] }}</div>
                                    <div class="pb-1 text-secondary">Zone {{ App\Models\EmergencyRoom::where('patient_id', $data["user_id"])->first()->id }}</div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-lg-4 col-md-5">
                                    <div class="avatar hover-effect bg-white shadow-sm p-1"><img
                                            src="{{ $data->profile_photo_url }}" width="200" height="200" /></div>
                                </div>
                                <div class="col-lg-8 col-md-7 text-center text-md-start">
                                    <h2 class="h2 mt-2 text-neutral-800" ><span
                                            class="text-sky-600 h1">{{ $data->name }}</span> {{ $data->surname }}</h2>
                                    <p data-aos="fade-left" class="text-neutral-800" data-aos-delay="100">
                                        {{ $data->privilege }}</p>
                                        <p data-aos="fade-left" class="text-neutral-600" data-aos-delay="100">@if ($data->zone instanceof Collection) @foreach ($data->zone as $zone) Zone {{ $zone->id }} @if(!$loop->last) - @endif @endforeach @else Zone {{ $data->zone->id }} @endif</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="about-section p-4 mt-2">
                        <div class="grid grid-cols-2 gap-x-4">
                            @if ($data instanceof Collection && $data->has("Clinical-Log"))
                                <div class="col-span-1">
                                    <div class="row mt-2">
                                        <div class="col-sm-4">
                                            <div class="pb-1">Cuil/Cuit</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="pb-1 text-secondary">{{$data["cuil"]}}</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="pb-1">Email</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="pb-1 text-secondary">{{$data["email"]}}</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="pb-1">Phone</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="pb-1 text-secondary">{{$data["Clinical-Log"]["phone"]}}</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="pb-1">Address</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="pb-1 text-secondary">{{$data["Clinical-Log"]["address"]}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-1">
                                    <div class="row mt-2">
                                        <div class="col-sm-4">
                                            <div class="pb-1">Age</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="pb-1 text-secondary">{{$data["Clinical-Log"]["age"]}}</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="pb-1">Gender</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="pb-1 text-secondary">{{$data["Clinical-Log"]["gender"]}}</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="pb-1">Sex</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="pb-1 text-secondary">{{$data["Clinical-Log"]["sex"]}}</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="pb-1">Born date</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="pb-1 text-secondary">{{$data["Clinical-Log"]["bornDate"]}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-1">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="pb-1">Blood group</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="pb-1 text-secondary">{{$data["Clinical-Log"]["bloodGroup"]}}</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="pb-1">Medical insurance</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="pb-1 text-secondary">{{App\Models\MedicalInsurance::find($data["Clinical-Log"]["medical_insurance_id"])->name}}</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="pb-1">Emergency contact phone</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="pb-1 text-secondary">{{$data["Clinical-Log"]["emergencyPhone"]}}</div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-span-1">
                                    <div class="row mt-2">
                                        <div class="col-sm-4">
                                            <div class="pb-1">Cuil/Cuit</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="pb-1 text-secondary">{{$data["cuil"]}}</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="pb-1">Email</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="pb-1 text-secondary">{{$data["email"]}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr class="d-print-none" />
                    <div class="grid grid-cols-3 gap-4 p-4">
                        <div class="col-span-2 gap-4">
                            <div class="w-full">
                                <h2 class="h3 mb-3">Patient log</h2>
                                @if ($data->has("Stay-Info"))
                                    @foreach ($data["Stay-Info"] as $info)
                                        @if ($info["type"] == "PatientDesignated")
                                            <p>At {{$info->info["created_at"]->format('H:i:s')}} of {{$info->info["created_at"]->format('d/m/y')}}, patient {{$data["name"]}}, {{$data["surname"]}} entered the institution with {{$info->info["info"]}}, it’s dispatched to Zone {{$info->zone_id}} {{-- , in charge of  {{$info->emergency_room->nurse->name}}, {{$info->emergency_room->nurse->surname}} --}}                                            </p><br>
                                        @endif
                                        @if ($data->has("Stay-Events"))
                                            @foreach ($data["Stay-Events"] as $event)
                                            @if ($info["type"] == "CallStarted")
                                                <p>At {{$event->info["created_at"]->format('H:i:s')}} of {{$event->info["created_at"]->format('d/m/y')}}. {{$event->info["info"]}}, the {{$event->call->type}} it’s activated.</p>
                                            @elseif($info["type"] == "CallChanged")
                                                <p>At {{$event->info["created_at"]->format('H:i:s')}} of {{$event->info["created_at"]->format('d/m/y')}}. The call changes to {{$event->call->type}} because of {{$event->info["info"]}}.</p>
                                            @elseif($info["type"] == "CallSolved")
                                                <p>At {{$event->info["created_at"]->format('H:i:s')}} of {{$event->info["created_at"]->format('d/m/y')}}. The help team attends the patient, counting a {{$event->call->responseTime}} seconds response time, resulting in {{$event->info["info"]}}</p>
                                            @endif
                                            @endforeach
                                        @endif
                                        @if ($info["type"] == "PatientDispatched")
                                            <p>At {{$info->info["created_at"]->format('H:i:s')}} of {{$info->info["created_at"]->format('d/m/y')}} the patient {{$info->info["info"]}}. Being dispatched from the emergency sector.</p><br>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div>
                            <div class="p-2">
                                <h2 class="text-sky-600 font-bold text-2xl mr-2 my-2">Conditions</h2>
                                <hr>
                                @if ($data->has("Pathologies"))
                                    @foreach ($data["Pathologies"] as $pathology)
                                        <div class="row mt-2">
                                            <div class="col-sm-4">
                                                <div class="pb-1">{{$pathology->pathologyType->name}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="p-2">
                                <h2 class="text-sky-600 font-bold text-2xl mr-2 my-2">Stay info</h2>
                                <hr>
                                @if ($data->has("Stay-Info"))
                                    @foreach ($data["Stay-Info"] as $info)
                                        <div class="row mt-2">
                                            <div class="pb-1">{{$info["type"]}} - {{$info->info["info"]}} - {{$info->info["created_at"]->format('H:i:s')}}</div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="p-2">
                                <h2 class="text-sky-600 font-bold text-2xl mr-2 my-2">Stay events</h2>
                                <hr>
                                @if ($data->has("Stay-Events"))
                                    @foreach ($data["Stay-Events"] as $event)
                                        <div class="row mt-2">
                                            <div class="pb-1">{{$event["type"]}} - {{$events->info["info"]}} - {{$events->info["created_at"]->format('H:i:s')}}</div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
