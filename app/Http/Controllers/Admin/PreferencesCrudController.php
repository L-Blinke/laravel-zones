<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ZonePreferencesTypesEnum;
use App\Http\Requests\PreferencesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PreferencesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PreferencesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Preferences::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/preferences');
        CRUD::setEntityNameStrings('preferences', 'preferences');
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation([

        ]);
        CRUD::AddField([
            'name'        => 'zonePreference',
            'label'       => "Zone visual order preference",
            'type'        => 'select_from_array',
            'options'     => ZonePreferencesTypesEnum::asArray(),
            'allows_null' => false,
        ]);
    }
}
