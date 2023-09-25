@php use SimpleSoftwareIO\QrCode\Facades\QrCode; $user = App\Models\User::find($id); @endphp

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
    <link href="/css/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet">
    <link href="/css/bootstrap.min.css?ver=1.2.0" rel="stylesheet">
    <link href="/css/aos.css?ver=1.2.0" rel="stylesheet">
    <link href="/css/main.css?ver=1.2.0" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body id="top">
    <div class="overflow-visible py-12">
        <div class="relative overflow-visible max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="cover shadow-lg bg-white">
                    <div class="bg-slate-200 p-3 p-lg-4 text-white">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="avatar hover-effect bg-white shadow-sm p-1"><img
                                        src="{{ $user->profile_photo_url }}" width="200" height="200" /></div>
                            </div>
                            <div class="col-lg-8 col-md-7 text-center text-md-start">
                                <h2 class="h2 mt-2 text-neutral-800" data-aos="fade-left" data-aos-delay="0"><span
                                        class="text-sky-600 h1">{{ $user->name }}</span> {{ $user->surname }}</h2>
                                <p data-aos="fade-left" class="text-neutral-800" data-aos-delay="100">Zone
                                    {{ $user->zone->id }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="about-section p-4 mt-2">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <div class="row mt-2">
                                    <div class="col-sm-4">
                                        <div class="pb-1">Age</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">28</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">Email</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">Joyce@company.com</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">Phone</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">+0718-111-0011</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">Address</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">140, City Center, New York, U.S.A</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="row mt-2">
                                    <div class="col-sm-4">
                                        <div class="pb-1">Age</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">28</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">Email</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">Joyce@company.com</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">Phone</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">+0718-111-0011</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">Address</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">140, City Center, New York, U.S.A</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="d-print-none" />
                    <div class="grid grid-cols-3 gap-4 p-4">
                        <div class="col-span-2 gap-4">
                            <div class="w-full">
                                <h2 class="h3 mb-3">Patient log</h2>
                                <p>Hello! I’m Joyce Harrison. I am passionate about UI/UX design and Web Design. I
                                    am a
                                    skilled Front-end Developer and master of Graphic Design tools such as Photoshop
                                    and
                                    Sketch.</p>
                            </div>
                        </div>
                        <div>
                            <div class="p-2">
                                <h2 class="text-sky-600 font-bold text-2xl mr-2 my-2">Conditions</h2>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-sm-4">
                                        <div class="pb-1">Age</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">28</div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <h2 class="text-sky-600 font-bold text-2xl mr-2 my-2">Stay info</h2>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-sm-4">
                                        <div class="pb-1">Age</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">28</div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <h2 class="text-sky-600 font-bold text-2xl mr-2 my-2">Stay events</h2>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-sm-4">
                                        <div class="pb-1">Age</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">28</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 relative">
                        {{QrCode::size(256)->generate(url('/userResume/'.$id))}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
    <script src="/scripts/aos.js?ver=1.2.0"></script>
    <script src="/scripts/main.js?ver=1.2.0"></script>
</body>

</html>
