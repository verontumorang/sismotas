<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Models\TeacherClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasUuids;

    protected $table = 'teachers';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'nip',
        'name',
        'username',
        'password',
    ];

    public function schedule(): hasMany
    {
        return $this->hasMany(Schedule::class, 'teacher_uuid', 'uuid');
    }
}
