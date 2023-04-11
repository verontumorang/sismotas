<?php

namespace App\Http\Controllers\Admin;

use App\Models\Schedule;
use App\Http\Requests\ScheduleRequest;
use App\Models\TeacherClass;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Route;

/**
 * Class ScheduleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ScheduleCrudController extends CrudController
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

    protected TeacherClass $teacherClass;

    public function setup()
    {
        $this->teacherClass = TeacherClass::findOrFail(Route::current()->parameter('teacher_class_uuid'));
        $this->crud->setModel(Schedule::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . "/teacher-class/{$this->teacherClass->uuid}/schedule");
        $this->crud->setEntityNameStrings('schedule', "{$this->teacherClass->course->name}");
        $this->crud->with('teacherClass.course');
        date_default_timezone_set("Asia/Jakarta");
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //testing
        $this->crud->addColumns([
            [
              'label' => 'Pertemuan ke',
              'name' => 'id',
              'type' => 'number',
            ],
            [
                'label' => 'Jam Mulai',
                'name' => 'start',
                'type' => 'time',
            ],
            [
                'label' => 'Jam Berakhir',
                'name' => 'end',
                'type' => 'time',
            ],
            [
                'label' => 'Aktivitias Pelajaran',
                'name' => 'activity',
                'type' => 'text',
            ]
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
        $this->crud->setValidation(ScheduleRequest::class);

        $this->crud->addFields([
            [
                'type' => 'hidden',
                'name' => 'teacher_class_uuid',
                'value' => $this->teacherClass->uuid,
            ],
            [
                'label' => 'Jam Mulai',
                'name' => 'start',
                'type' => 'text',
                'value' => date("h:i"),
            ],
            [
                'label' => 'Jam Berakhir',
                'name' => 'end',
                'type' => 'time',
            ],
            [
                'label' => 'Aktivitias Pelajaran',
                'name' => 'activity',
                'type' => 'text',
            ]
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
