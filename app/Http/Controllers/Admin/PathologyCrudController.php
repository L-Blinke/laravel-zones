<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PathologieRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PathologieCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PathologyCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Pathology::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/pathologies');
        CRUD::setEntityNameStrings('pathology', 'pathologies');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'label' => "Pathology type",
            'name' => 'pathology_type_id'
        ]);
        CRUD::addColumn([
            'label' => "Clinical log id",
            'name' => 'clinical_log_id'
        ]);
        CRUD::addButtonFromModelFunction('top', 'Export', 'Export');
        CRUD::addButtonFromModelFunction('top', 'Import', 'Import');
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
            'pathology_type_id' => 'required',
            'clinical_log_id' => 'required',
        ]);

        CRUD::addField([  // Select
            'label'     => "Pathology Type",
            'type'      => 'select',
            'name'      => 'pathology_type_id',
            'entity'    => 'pathologyType',
            'model'     => "App\Models\PathologyType",
            'attribute' => 'name',
         ]);
         CRUD::addField([  // Select
            'label'     => "Clinical log",
            'type'      => 'select',
            'name'      => 'clinical_log_id',
            'entity'    => 'clinicalLog',
            'model'     => "App\Models\ClinicalLog",
            'attribute' => 'user_id',
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
