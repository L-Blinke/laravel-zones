<div class="overflow-visible bg-white p-8 dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg grid md:grid-cols-3 gap-8">
    <div class="md:col-span-1">
        <livewire:dashboard.zones-view wire:poll.15s />
    </div>
    <div class="md:col-span-2">
        <livewire:call-table-backup wire:poll.15s />
    </div>
</div>
