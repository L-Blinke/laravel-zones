<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ZoneRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ZoneCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ZoneCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \App\Http\Controllers\Admin\Operations\AsignOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Zone::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/zone');
        CRUD::setEntityNameStrings('zone', 'zones');
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

        CRUD::addColumn([
            'label' => "Zone number",
            'name' => 'id'
        ]);

        CRUD::addButtonFromModelFunction('line','asign','asign','beginning');
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
            // 'name' => 'required|min:2',
        ]);

        CRUD::addField([  // Select
            'label'     => "Patient",
            'type'      => 'select',
            'name'      => 'patient_id',
            'entity'    => 'patient',
            'model'     => "App\Models\User",
            'attribute' => 'name',
            'options'   => (function ($query) {
                 return $query->where('privilege', '=', "Patient")->doesntHave('zone')->get();
             })
         ]);
         CRUD::addField([  // Select
            'label'     => "Nurse",
            'type'      => 'select',
            'name'      => 'nurse_id',
            'entity'    => 'nurse',
            'model'     => "App\Models\User",
            'attribute' => 'name',
            'options'   => (function ($query) {
                 return $query->where('privilege', '=', "Nurse")->get();
             })
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
        $this->setupCreateOperation();
    }
}
