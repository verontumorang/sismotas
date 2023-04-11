<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Models\Attendance;
use App\Models\TeacherClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasUuids;

    protected $table = 'schedules';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'teacher_class_uuid',
        'start',
        'end',
        'activity',
    ];

    public function teacherClass(): BelongsTo
    {
        return $this->belongsTo(TeacherClass::class, 'teacher_class_uuid', 'uuid');
    }

    public function attendance(): hasMany
    {
        return $this->hasMany(Attendance::class, 'schedule_uuid', 'uuid');
    }
}
