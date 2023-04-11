<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Teacher;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TeacherClass extends Model
{
    use HasFactory;
    use HasUuids;
    use CrudTrait;

    protected $table = 'teacher_classes';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'teacher_uuid',
        'course_uuid',
        'class',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_uuid', 'uuid');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_uuid', 'uuid');
    }

    public function schedule(): hasMany
    {
        return $this->hasMany(Schedule::class, 'teacher_class_uuid', 'uuid');
    }
}
