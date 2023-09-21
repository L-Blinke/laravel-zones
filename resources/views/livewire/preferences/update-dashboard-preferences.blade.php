<x-form-section submit="save">
    <x-slot name="title">
        {{ __('Dashboard preferences') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Select the preferences of dashboard rendering') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        <div wire:ignore class="col-span-6 sm:col-span-6">
            <x-label class="mb-2"  value="{{ __('Zones distribution shape') }}" />
            <!-- Profile Photo File Input -->
            <select wire:model.live="selectedInput" data-te-select-init>
                <option value="U">U distribution</option>
                <option value="L">L distribution</option>
                <option value="I">I distribution</option>
                <option value="E">E distribution</option>
            </select>
            <label data-te-select-label-ref>Select course</label>

        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
