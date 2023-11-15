<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="overflow-visible py-12">
        <div class="overflow-visible w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-visible bg-white p-8 dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg grid md:grid-cols-3 gap-8">
                <div class="md:col-span-1">
                    <livewire:dashboard.zones-view wire:poll.15s />
                </div>
                <div class="md:col-span-2">
                    <livewire:call-table-backup wire:poll.15s />
                </div>
            </div>
        </div>
    </div>

    @foreach (\App\Models\Call::all() as $call)
        <livewire:solve-call-modal :call="$call"/>
    @endforeach

    First =
    @php
        $coso = new Otp;
        echo $coso->generate(App\Models\OtpCode::find(1)->passphrase, 6)->token;
    @endphp

    <br>

    Second =
    @php
        echo $coso->generate(App\Models\OtpCode::find(2)->passphrase, 6)->token;
    @endphp

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>

</x-app-layout>
