<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Enums\ComponentType;
use Backpack\CRUD\app\Library\Widget;
use App\Enums\ZonePreferencesTypesEnum;
use App\Http\Requests\ZoneComponentRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ZoneComponentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ZoneComponentCrudController extends CrudController
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
        CRUD::setModel(\App\Models\ZoneComponent::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/zone-component');
        CRUD::setEntityNameStrings('zone component', 'zone components');
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
            // 'name' => 'required|min:2',
        ]);

        CRUD::AddField([
            'name' => 'name',
            'label' => "Component name",
        ]);

        CRUD::field('name')->tab('Create component');

        CRUD::addField([  // Select
            'label' => "Dashboard",
            'type' => 'select',
            'name' => 'dashboard_id',
            'entity' => 'dashboard',
            'model' => "App\Models\Dashboard",
            'attribute' => 'name',
        ]);

        CRUD::field('dashboard_id')->tab('Create component');

        CRUD::field('type')->tab('Create component');

        $modelMethods = collect(get_class_methods(User::class))->filter(function ($method) {
            return strpos($method, 'Data') !== false;
        });


        $models = [];
        foreach (glob(app_path('Models') . '/*.php') as $file) {
            if (method_exists((new("App\\Models\\" . explode(".", class_basename($file))[0])), "HasData")) {
                $models[] = explode(".", class_basename($file))[0];
            }
        }

        CRUD::AddField([
            'name' => 'model_id',
            'label' => "Model name",
            'type' => 'select_from_array',
            'options' => $models,
            'allows_null' => false,
        ]);
        CRUD::field('model_id')->tab('Component data');

        foreach ($models as $key => $value) {
            CRUD::AddField([
                'name' => 'function_name_' . $key.'_1',
                'label' => "Select method A",
                'type' => 'select_from_array',
                'options' => collect(get_class_methods(new("App\\Models\\" . $value)))->filter(function ($method) {
                    return strpos($method, 'Data') !== false && strpos($method, 'HasData') === false;
                }),
                'allows_null' => false,
            ]);
            CRUD::field('function_name_' . $key . '_1')->tab('Component data');

            CRUD::AddField([
                'name' => 'function_name_' . $key.'_2',
                'label' => "Select method B",
                'type' => 'select_from_array',
                'options' => collect(get_class_methods(new("App\\Models\\" . $value)))->filter(function ($method) {
                    return strpos($method, 'Data') !== false && strpos($method, 'HasData') === false;
                }),
                'allows_null' => false,
            ]);
            CRUD::field('function_name_' . $key . '_2')->tab('Component data');

            CRUD::AddField([
                'name' => 'function_name_' . $key.'_3',
                'label' => "Select method C",
                'type' => 'select_from_array',
                'options' => collect(get_class_methods(new("App\\Models\\" . $value)))->filter(function ($method) {
                    return strpos($method, 'Data') !== false && strpos($method, 'HasData') === false;
                }),
                'allows_null' => false,
            ]);
            CRUD::field('function_name_' . $key . '_3')->tab('Component data');

            CRUD::AddField([
                'name' => 'function_name_' . $key.'_4',
                'label' => "Select method D",
                'type' => 'select_from_array',
                'options' => collect(get_class_methods(new("App\\Models\\" . $value)))->filter(function ($method) {
                    return strpos($method, 'Data') !== false && strpos($method, 'HasData') === false;
                }),
                'allows_null' => false,
            ]);
            CRUD::field('function_name_' . $key . '_4')->tab('Component data');
        }

        CRUD::AddField([   // Range
            'name'  => 'range',
            'label' => 'Methods quantity',
            'type'  => 'range',
            'attributes' => [
                'min' => 1,
                'max' => 4,
                'list' => 'values',
            ],
        ]);

        CRUD::AddField([   // CustomHTML
            'name'  => 'separator',
            'type'  => 'custom_html',
            'value' => '<datalist id="values">
            <option value="1" label="1"></option>
            <option value="2" label="2"></option>
            <option value="3" label="3"></option>
            <option value="4" label="4"></option>
          </datalist>
          <style>
          datalist {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            writing-mode: vertical-lr;
            width: 100%;
          }

          option {
            padding: 0;
          }
          </style>'
        ]);

        CRUD::field('range')->tab('Component config');
        CRUD::field('separator')->tab('Component config');

        Widget::add()->type('script')->content('assets/js/admin/forms/components.js');
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
            // 'name' => 'required|min:2',
        ]);

        $this->setupCreateOperation();
    }
}
