<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="overflow-visible py-12">
        <div class="overflow-visible max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-visible bg-white p-8 dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tables.call-table :callZone='$zone'/>
            </div>
        </div>
    </div>
</x-app-layout>
