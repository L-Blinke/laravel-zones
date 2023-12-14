<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="overflow-visible py-12">
        <div class="overflow-visible w-12xl mx-auto sm:px-6 lg:px-8">
            @if (Auth::user()->privilege == 'Receptionist')
                <x-dashboard.dashboard-1 />
            @elseif (Auth::user()->privilege == 'Paramedic')
                <x-dashboard.dashboard-2 />
            @endif
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>


</x-app-layout>
