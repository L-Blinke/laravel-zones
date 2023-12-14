<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
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
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
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
             'name' => 'required|min:2',
             'surname' => 'required|min:2',
             'email' => 'required|email|unique:users,email,'.CRUD::getCurrentEntryId(),
             'cuil' => 'required|integer|unique:users,cuil,'.CRUD::getCurrentEntryId(),
             'password' => 'required|min:4',
             'privilege' => Rule::in(["Receptionist","Patient","Nurse","Paramedic","Accountant", "Button"]),
        ]);

        CRUD::AddField([
            'name'        => 'name',
            'label'       => "Name",
        ]);
        CRUD::AddField([
            'name'        => 'surname',
            'label'       => "Surname",
        ]);
        CRUD::AddField([
            'name'        => 'email',
            'label'       => "Email",
        ]);
        CRUD::AddField([
            'name'        => 'cuil',
            'label'       => "Cuil",
        ]);
        CRUD::AddField([
            'name'        => 'privilege',
            'label'       => "Privilege",
            'type'        => 'select_from_array',
            'options'     => ["Receptionist" => "Receptionist", "Patient" => "Patient","Nurse" => "Nurse","Paramedic" => "Paramedic","Accountant" => "Accountant",
            "Button" => "Button"],
            'allows_null' => false,
        ]);
        CRUD::AddField([
            'name'        => 'password',
            'label'       => "Password",
        ]);

        \App\Models\User::creating(function ($entry) {
            $entry->password = Hash::make($entry->password);
        });
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
            'name' => 'required|min:2',
            'surname' => 'required|min:2',
            'email' => 'required|email|unique:users,email,'.CRUD::getCurrentEntryId(),
            'cuil' => 'required|integer|unique:users,cuil,'.CRUD::getCurrentEntryId(),
            'privilege' => Rule::in(["Receptionist","Patient","Nurse","Paramedic","Accountant"]),
       ]);

       CRUD::AddField([
           'name'        => 'name',
           'label'       => "Name",
       ]);
       CRUD::AddField([
           'name'        => 'surname',
           'label'       => "Surname",
       ]);
       CRUD::AddField([
           'name'        => 'email',
           'label'       => "Email",
       ]);
       CRUD::AddField([
           'name'        => 'cuil',
           'label'       => "Cuil",
       ]);
       CRUD::AddField([
           'name'        => 'privilege',
           'label'       => "Privilege",
           'type'        => 'select_from_array',
           'options'     => ["Receptionist" => "Receptionist", "Patient" => "Patient","Nurse" => "Nurse","Paramedic" => "Paramedic","Accountant" => "Accountant"],
           'allows_null' => false,
       ]);
       CRUD::AddField([
           'name'        => 'password',
           'label'       => "Password",
       ]);


        \App\Models\User::updating(function ($entry) {
            if (request('password') == null) {
                $entry->password = $entry->getOriginal('password');
            } else {
                $entry->password = Hash::make(request('password'));
            }
        });
    }
}
