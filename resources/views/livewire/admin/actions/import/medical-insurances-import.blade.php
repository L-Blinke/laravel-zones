<div>
    <x-form-section submit="save">
        <x-slot name="title">
            {{ __('Import medical insurances') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Import medical insurances from a excel file.') }}
        </x-slot>

        <x-slot name="form">
            <!-- Profile Photo -->
            <div x-data="{photoName: null}" class="col-span-6 sm:col-span-6">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="excel"
                            x-ref="excel"
                            x-on:change="
                                    photoName = $refs.excel.files[0].name;
                            " />

                <x-label for="excel" value="{{ __('Import medical insurances') }}" />

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.excel.click()">
                    {{ __('Select A XLSX file') }}
                </x-secondary-button>

            </div>
        </x-slot>

        <x-slot name="actions">
            <x-action-message class="mr-3" on="saved">
                {{ __('Imported.') }}
            </x-action-message>

            <x-button wire:loading.attr="disabled" wire:target="excel">
                {{ __('Import') }}
            </x-button>
        </x-slot>
    </x-form-section>
</div>
