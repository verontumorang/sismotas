<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attendance;
use App\Models\Schedule;
use App\Http\Requests\ScheduleRequest;
use App\Models\Student;
use App\Models\TeacherClass;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Route;

/**
 * Class AttendanceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AttendanceCrudController extends CrudController
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

    protected Schedule $schedule;

    public function setup()
    {
        $this->schedule = Schedule::findOrFail(Route::current()->parameter('schedule_uuid'));
        $this->crud->setModel(Attendance::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/attendance');
        $this->crud->setEntityNameStrings('Attendance', "{$this->schedule->teacherClass->course->name} Pertemuan {$this->schedule->id}");
        $this->crud->with('teacher.course');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ScheduleRequest::class);

        $this->crud->addColumns([
            [
                'type' => 'hidden',
                'value' => $this->schedule->uuid,
            ],
            [
                'name' => 'student_uuid',
                'label' => "Nama Siswa",
                'type' => 'select_from_array',
                'options' => Student::pluck('name', 'uuid'),
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
