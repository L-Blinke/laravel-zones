<a href="javascript:void(0)">
    <div id="zone" class="group grid place-content-center row-span-1 {{$model->statusClasses()}} box-content h-16 w-full hover:scale-125 transition-all relative">
        <h2 id="zoneTitle" class="justify-center content-center">{{$model->id}}</h2>
        <div id="zoneHoverDetails" class="fixed -top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 items-center justify-center place-content-center rounded-lg invisible group-hover:visible bg-slate-200 p-2">
            <p class="justify-center text-center">{{($model->nurse != null) ? "Nurse ".$model->nurse->name : "No nurse designated"}}</p>
            <p class="justify-center text-center">{{($model->patient != null) ? "Patient ".$model->patient->name : "No patient designated"}}</p>
        </div>
    </div>
</a>
<script>{!! $model->statusEvents() !!}</script>

