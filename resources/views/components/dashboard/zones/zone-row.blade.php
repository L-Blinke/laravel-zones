<a href="javascript:void(0)">
    <div class="group grid place-content-center row-span-1 {{$model->statusClasses()}} box-content h-16 w-full hover:scale-125 transition-all relative">
        <h2 class="justify-center content-center">{{$model->id}}</h2>
        <div class="grid place-content-center rounded-lg invisible group-hover:visible fixed bg-slate-200 -left-14 -top-20 h-16 w-48">
            <p class="justify-center text-center">{{($model->nurse != null) ? "Nurse ".$model->nurse->name : "No nurse designated"}}</p>
            <p class="justify-center text-center">{{($model->patient != null) ? "Patient ".$model->patient->name : "No patient designated"}}</p>
        </div>
    </div>
</a>
