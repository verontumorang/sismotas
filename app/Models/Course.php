<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Models\TeacherClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function Schedule(): HasMany
    {
        return $this->hasMany(Schedule::class, 'course_uuid', 'uuid');
    }
}
