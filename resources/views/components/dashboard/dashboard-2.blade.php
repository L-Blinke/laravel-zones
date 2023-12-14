<div class="overflow-visible bg-white p-8 dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg grid md:grid-cols-3 gap-8">
    <div class="md:col-span-1">
        <livewire:dashboard.zone-view wire:poll.15s />
    </div>
    <div class="md:col-span-2">
        <form action="/api/call/diagnose" method="post">
            @csrf
            <div class="relative mb-3 mt-3">
                <select name="p" class="mb-3 mt-3" data-te-select-init>
                    @foreach (App\Models\User::has('clinicalLogData')->get() as $zone)
                        <option value="{{$zone->clinicalLogData->id}}">{{$zone->name}}, {{$zone->surname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="relative mb-3 mt-3">
                <select name="pathology" class="mb-3 mt-3" data-te-select-init>
                    @foreach (App\Models\PathologyType::all() as $zone)
                        <option value="{{$zone->id}}">{{$zone->name}}</option>
                    @endforeach
                </select>
            </div>
            <input
                class="inline-block rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                data-te-ripple-init data-te-ripple-color="light" type="submit">
        </form>
    </div>
</div>
