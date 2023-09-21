<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="overflow-visible py-12">
        <div class="overflow-visible max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-visible bg-white p-8 dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg grid grid-cols-3 gap-8">
                <div class="col-span-2">
                    <livewire:tables.call-table />
                </div>
                @livewire('dashboard.zones-view')
            </div>
        </div>
    </div>
</x-app-layout>
