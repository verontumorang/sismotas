<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Models\TeacherClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasUuids;

    protected $table = 'courses';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'name',
    ];

    public function TeacherClass(): HasMany
    {
        return $this->hasMany(TeacherClass::class, 'course_uuid', 'uuid');
    }
}
