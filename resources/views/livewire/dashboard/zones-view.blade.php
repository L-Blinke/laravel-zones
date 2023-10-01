<div wire:poll="refresh" class="relative"> @php use App\Models\Zone; @endphp
    <div class="grid grid-rows-{{$columns[0]}} grid-cols-{{count($columns)}} gap-4">@php $count = 0; @endphp
        @foreach ($columns as $index => $column)
            <div class="row-span-{{$columns[0]}} grid grid-rows-{{$columns[0]}} gap-4">
                @php if (isset($spaces)) {  if (array_key_exists($index, $spaces)) {  if (!empty($spaces[$index])) { if ((max($spaces[$index]) + 1) > $column) { $referenceNumber = max($spaces[$index]) + 1; }else{ $referenceNumber = $column; } }else{ $referenceNumber = $column; } }else{ $referenceNumber = $column; } }else{ $referenceNumber = $column; } @endphp
                @for ($i = 0; $i < $referenceNumber; $i++)
                    @if (isset($spaces))
                        @if (in_array($i+1, $spaces[$index]))
                            <div class="row-span-1 h-16 w-full"></div>
                            @if (!in_array(($i+2), $spaces[$index]))
                                 <x-dashboard.zones.zone-row :zone="Zone::find($count+1)" />
                                @php $count++; @endphp
                            @endif
                        @else
                            @if ($i < $column && !in_array($i, $spaces[$index]))
                                <x-dashboard.zones.zone-row :zone="Zone::find($count+1)" />
                                @php $count++; @endphp
                            @endif
                        @endif
                    @else
                    <x-dashboard.zones.zone-row :model="Zone::find($count+1)" />
                        @php $count++; @endphp
                    @endif
                @endfor
            </div>
        @endforeach
    </div>
</div>
