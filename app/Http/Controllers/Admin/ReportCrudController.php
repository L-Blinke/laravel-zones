<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ReportType;
use App\Http\Requests\ReportRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReportCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReportCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Report::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/report');
        CRUD::setEntityNameStrings('report', 'reports');
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
        CRUD::addButtonFromModelFunction('line', 'Show', 'Show');
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

        CRUD::AddField([
            'name'        => 'type',
            'label'       => "Report type",
            'type'        => 'select_from_array',
            'options'     => ReportType::asArray(),
            'allows_null' => false,
        ]);

        CRUD::addField([  // Select
            'label'     => "Patient",
            'type'      => 'select',
            'name'      => 'reported_id',
            'entity'    => 'patient',
            'model'     => "App\Models\User",
            'attribute' => 'name',
            'options'   => (function ($query) {
                return $query->where('privilege', '=', "Patient")->get();
            })
        ]);

        // CRUD::addField([  // Select
        //     'label'     => "Nurse",
        //     'type'      => 'select',
        //     'name'      => 'reported_id',
        //     'entity'    => 'nurse',
        //     'model'     => "App\Models\User",
        //     'attribute' => 'name',
        //     'options'   => (function ($query) {
        //         return $query->where('privilege', '=', "Nurse")->get();
        //     })
        // ]);

        // CRUD::addField([  // Select
        //     'label'     => "Emergency Room",
        //     'type'      => 'select',
        //     'name'      => 'reported_id3',
        //     'entity'    => 'emergencyRoom',
        //     'model'     => "App\Models\EmergencyRoom",
        //     'attribute' => 'id',
        // ]);
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
