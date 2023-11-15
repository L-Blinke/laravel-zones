<div>
    <ul>
        @foreach ($data->zoneData as $dataRow)
            <li class="{{$config["classes"][$loop->iteration]}}">{{$dataRow}}</li>
        @endforeach
    </ul>
</div>
