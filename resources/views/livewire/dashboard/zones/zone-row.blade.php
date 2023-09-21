<a href="javascript:void(0)">
    <div class="group grid place-content-center row-span-1 {{(App\Models\Zone::find($zone+1)->nurse != null) ? : "bg-slate-600"}} {{(App\Models\Zone::find($zone+1)->nurse == null) ? : "bg-green-400"}} {{(App\Models\Zone::find($zone+1)->nurse == null && App\Models\Zone::find($zone+1)->patient == null) ? : "bg-green-600"}} box-content h-16 w-full hover:scale-125 transition-all relative">
        <h2 class="justify-center content-center">{{$zone+1}}</h2>
        <div class="grid place-content-center rounded-lg invisible group-hover:visible fixed bg-slate-200 -left-14 -top-20 h-16 w-48">
            <p class="justify-center text-center">{{(App\Models\Zone::find($zone+1)->nurse != null) ? "Nurse ".App\Models\Zone::find($zone+1)->nurse->name : "No nurse designated"}}</p>
            <p class="justify-center text-center">{{(App\Models\Zone::find($zone+1)->patient != null) ? "Patient ".App\Models\Zone::find($zone+1)->nurse->name : "No patient designated"}}</p>
        </div>
    </div>
</a>
