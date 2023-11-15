<div class="{{$model->zoneDetailsClasses}}">
    @foreach ($model->$components as $component)
        <x-dynamic-component :component="$component" :model="$model"/>
    @endforeach
</div>
