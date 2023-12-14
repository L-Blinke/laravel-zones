<div wire:poll="refresh" class="relative">
    @if (App\Models\EmergencyRoom::has('patient')->count() != null)
    <div class="grid grid-rows-{{$columns[0]}} grid-cols-{{count($columns)}} gap-4">@php $patients = App\Models\EmergencyRoom::has('patient')->get(); $count = 0; @endphp
        @foreach ($columns as $index => $column)
            <div class="row-span-{{$columns[0]}} grid grid-rows-{{$columns[0]}} gap-4">
                @php if (isset($spaces)) {  if (array_key_exists($index, $spaces)) {  if (!empty($spaces[$index])) { if ((max($spaces[$index]) + 1) > $column) { $referenceNumber = max($spaces[$index]) + 1; }else{ $referenceNumber = $column; } }else{ $referenceNumber = $column; } }else{ $referenceNumber = $column; } }else{ $referenceNumber = $column; } @endphp
                @for ($i = 0; $i < $referenceNumber; $i++)
                    @if (isset($spaces) && $patients->has($count))
                        @if (in_array($i+1, $spaces[$index]))
                            <div class="row-span-1 h-16 w-full"></div>
                            @if (!in_array(($i+2), $spaces[$index]))
                                <x-dashboard.zones.zone-row :zone="$patients[$count]" />
                                @php $count++; @endphp
                            @endif
                        @else
                            @if ($i < $column && !in_array($i, $spaces[$index]))
                                <x-dashboard.zones.zone-row :zone="$patients[$count]" />
                                @php $count++; @endphp
                            @endif
                        @endif
                    @elseif ($patients->has($count))
                    <x-dashboard.zones.zone-row :model="$patients[$count]" />
                        @php $count++; @endphp
                    @endif
                @endfor
            </div>
        @endforeach
    </div>
    @endif
</div>
