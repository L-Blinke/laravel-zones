<?php

namespace App\Http\Controllers\Admin\Operations;

use App\Models\EmergencyRoom;
use Backpack\CRUD\app\Http\Controllers\Operations\Concerns\HasForm;
use Backpack\CRUD\app\Library\Widget;

trait AsignOperation
{
    use HasForm;

    /**
     * Define which routes are needed for this operation.
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupAsignRoutes(string $segment, string $routeName, string $controller): void
    {
        $this->formRoutes(
            operationName: 'asign',
            routesHaveIdSegment: true,
            segment: $segment,
            routeName: $routeName,
            controller: $controller
        );
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupAsignDefaults(): void
    {
        $this->formDefaults(
            operationName: 'asign',
            buttonStack: 'line', // alternatives: top, bottom
            buttonMeta: [
                'icon' => 'la la-star-of-life',
                'label' => 'Asign',
                'wrapper' => [
                     'target' => '_blank',
                ],
            ],
        );
        Widget::add()->type('script')->content('assets/js/admin/forms/assign.js');
        $this->crud->operation('asign', function () {
            $this->crud->addField([
                'label'     => "Patient",
                'type'      => 'select',
                'name'      => 'patient_id',
                'entity'    => 'patient',
                'model'     => "App\Models\User",
                'attribute' => 'name',
                'options'   => (function ($query) {
                     return $query->where('privilege', '=', "Patient")->get();
                 })
             ]);

             if (EmergencyRoom::find($this->crud->getCurrentEntryId())->patient()->exists() != null) {
                $this->crud->addField([
                    'name'  => 'originalValue',
                    'type'  => 'hidden',
                    'value' => EmergencyRoom::find($this->crud->getCurrentEntryId())->patient->id,
                ]);
             }

            $this->crud->addField([
                "label"     => "Dispatch message",
                'type'      => 'textarea',
                'name'      => 'dispatchMessage',
            ]);
            $this->crud->addField([
                "label"     => "Assignation message",
                'type'      => 'textarea',
                'name'      => 'assignMessage',
            ]);
        });
    }

    /**
     * Method to handle the GET request and display the View with a Backpack form
     *
     */
    public function getAsignForm(int $id) : \Illuminate\Contracts\View\View
    {
        return $this->formView($id);
    }

    /**
    * Method to handle the POST request and perform the operation
    *
    * @return array|\Illuminate\Http\RedirectResponse
    */
    public function postAsignForm(int $id)
    {
        return $this->formAction($id, function ($inputs, $entry) {
            if($entry->patient()->exists() && $inputs["patient_id"] != null){
                $entry->dispatchAndAsignPatient($inputs["patient_id"], $inputs["dispatchMessage"], $inputs["assignMessage"]);
            }else if($entry->patient()->exists() && $inputs["patient_id"] == null){
                $entry->dispatchPatient($inputs["dispatchMessage"]);
            }else{
                $entry->AsignPatient($inputs["patient_id"], $inputs["assignMessage"]);
            }

            // show a success message
            \Alert::success('Order executed successfully')->flash();
        });
    }
}
