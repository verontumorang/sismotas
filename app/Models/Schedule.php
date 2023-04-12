<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Models\Attendance;
use App\Models\TeacherClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasUuids;

    protected $table = 'schedules';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'teacher_uuid',
        'course_uuid',
        'class',
        'start',
        'end',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_uuid', 'uuid');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_uuid', 'uuid');
    }

    public function attendance(): hasMany
    {
        return $this->hasMany(Attendance::class, 'schedule_uuid', 'uuid');
    }
}
