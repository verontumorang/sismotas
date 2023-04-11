<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Http\Requests\TeacherRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TeacherCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TeacherCrudController extends CrudController
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
        $this->crud->setModel(Teacher::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/teacher');
        $this->crud->setEntityNameStrings('guru', 'guru');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    //untuk tampilan view list
    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'label' => 'Nama Guru',
                'name' => 'name',
                'type' => 'text'
            ],
            [
                'label' => 'NIP',
                'name' => 'nip',
                'type' => 'text'
            ],
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
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
        $this->crud->setValidation(TeacherRequest::class);

        $this->crud->addFields([
            [
                'label' => 'Nama Guru',
                'name' => 'name',
                'type' => 'text'
            ],
            [
                'label' => 'NIP',
                'name' => 'nip',
                'type' => 'text'
            ],
            [
                'label' => 'Username',
                'name' => 'username',
                'type' => 'text'
            ],
            [
                'label' => 'Password',
                'name' => 'password',
                'type' => 'password'
            ],
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

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
