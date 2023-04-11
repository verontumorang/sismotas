<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Schedule;
use App\Http\Requests\ScheduleRequest;
use App\Models\Teacher;
use App\Models\TeacherClass;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TeacherClassCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TeacherClassCrudController extends CrudController
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
        $this->crud->setModel(TeacherClass::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/teacher-class');
        $this->crud->setEntityNameStrings('Teacher Class', 'Teacher Classes');
        $this->crud->with('course');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addButtonFromView('line', 'schedule', 'schedule', 'beginning');

        $this->crud->addColumns([
            [
                'label' => 'Kelas',
                'name' => 'class',
                'type' => 'text',
            ],
            [
              'label' => 'Nama Mata Pelajaran',
              'name' => 'course.name',
              'type' => 'text',
            ],
        ]);
    }

      /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->crud->addFields([
            [
                'name' => 'teacher_uuid',
                'label' => "Nama Guru",
                'type' => 'select_from_array',
                'options' => Teacher::pluck('name', 'uuid'),
            ],
            [
                'name' => 'course_uuid',
                'label' => "Mata Pelajaran",
                'type' => 'select_from_array',
                'options' => Course::pluck('name', 'uuid'),
            ],
             [
                'label' => 'Kelas',
                'name' => 'class',
                'type' => 'text',
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
}
