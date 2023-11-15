<?php

namespace App\Http\Controllers\Admin;

use App\Enums\InterruptorTypesEnum;
use App\Http\Requests\OtpCodeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Validation\Rule;
use App\Models\EmergencyRoom;

/**
 * Class OtpCodeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OtpCodeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\OtpCode::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/otp-code');
        CRUD::setEntityNameStrings('otp code', 'otp codes');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation([
            'zone_id' => Rule::in(EmergencyRoom::pluck('id')->toArray()),
            'type' => Rule::in(InterruptorTypesEnum::asArray()),
            'passphrase' => 'required'
       ]);
       CRUD::AddField([
            'name'        => 'type',
            'label'       => "Interruptor type",
            'type'        => 'select_from_array',
            'options'     => InterruptorTypesEnum::asArray(),
            'allows_null' => false,
        ]);
       CRUD::AddField([
           'name'        => 'passphrase',
           'label'       => "OTP Passphrase",
       ]);
       CRUD::addField([  // Select
        'label'     => "Interruptor zone",
        'type'      => 'select',
        'name'      => 'zone_id',
        'entity'    => 'zone',
        'model'     => "App\Models\EmergencyRoom",
        'attribute' => 'id'
        ]);
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
            'zone_id' => Rule::in(EmergencyRoom::pluck('id')->toArray()),
            'type' => Rule::in(InterruptorTypesEnum::asArray()),
            'passphrase' => 'nullable'
       ]);

       CRUD::AddField([
        'name'        => 'type',
        'label'       => "Interruptor type",
        'type'        => 'select_from_array',
        'options'     => InterruptorTypesEnum::asArray(),
        'allows_null' => false,
        ]);
       CRUD::AddField([
           'name'        => 'passphrase',
           'label'       => "OTP Passphrase",
       ]);
       CRUD::addField([  // Select
        'label'     => "Interruptor zone",
        'type'      => 'select',
        'name'      => 'zone_id',
        'entity'    => 'zone',
        'model'     => "App\Models\EmergencyRoom",
        'attribute' => 'id',
        'options'   => (function ($query) {
             return $query->get();
         })
        ]);
    }
}
