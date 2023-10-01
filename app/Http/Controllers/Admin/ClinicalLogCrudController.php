<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClinicalLogRequest;
use App\Models\ClinicalLog;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Database\Query\Builder;

/**
 * Class ClinicalLogCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClinicalLogCrudController extends CrudController
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
        CRUD::setModel(\App\Models\ClinicalLog::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/clinical-log');
        CRUD::setEntityNameStrings('clinical log', 'clinical logs');
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
            'user_id'  => 'required',
            'gender'  => 'required',
            'sex'  => 'required',
            'bornDate'  => 'required',
            'age'  => 'required',
            'address'  => 'required',
            'phone'  => 'required',
            'bloodGroup'  => 'required',
            'medical_insurance_id' => 'required',
            'emergencyPhone' => 'required',
       ]);

        CRUD::addField([
            'label'     => "Paciente",
            'type'      => 'select',
            'name'      => 'user_id',
            'entity'    => 'patient',
            'model'     => "App\Models\User",
            'attribute' => 'name',
            'options'   => (function ($query) {
                return $query->where('privilege', '=', "Patient")->whereNotIn('id', ClinicalLog::pluck('id')->toArray())->get();
            })
        ]);
        CRUD::AddField([
            'name'        => 'sex',
            'label'       => "Sexo",
            'type'        => 'select_from_array',
            'options'     => ["Male" => "Masculino", "Female" => "Femenino","Unknown" => "Desconocido"],
            'allows_null' => false,
        ]);
        CRUD::AddField([
            'name'        => 'gender',
            'label'       => "Genero",
            'type'        => 'select_from_array',
            'options'     => ["He" => "Hombre", "She" => "Mujer","They" => "X"],
            'allows_null' => false,
        ]);
        CRUD::AddField([
            'name'  => 'bornDate',
            'label' => 'Fecha de nacimiento',
            'type'  => 'date'
        ]);
        CRUD::AddField([
            'name' => 'age',
            'label' => 'Edad',
            'type' => 'number',
        ]);
        CRUD::AddField([   // Text
            'name'  => 'address',
            'label' => "Dirección",
            'type'  => 'text',
        ]);
        CRUD::AddField([
            'name' => 'phone',
            'label' => 'Numero de teléfono',
            'type' => 'number',
        ]);

        CRUD::AddField([
            'name'        => 'bloodGroup',
            'label'       => "Grupo sanguíneo",
            'type'        => 'select_from_array',
            'options'     => ["A+" => "A+", "B+" => "B+","AB+" => "AB+","O+" => "O+","A-" => "A-", "B-" => "B-","AB-" => "AB-","O-" => "O-"],
            'allows_null' => false,
        ]);
        CRUD::addField([
            'label'     => "Cobertura medica",
            'type'      => 'select',
            'name'      => 'medical_insurance_id',
            'entity'    => 'medicalInsurance',
            'model'     => "App\Models\MedicalInsurance",
            'attribute' => 'name',
         ]);
        CRUD::AddField([
            'name' => 'emergencyPhone',
            'label' => 'Numero de teléfono de emergencia',
            'type' => 'number',
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
