<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasUuids;

    protected $table = 'students';
    protected $primaryKey = 'uuid';
    protected $fillable = [
         'nis',
         'name',
         'username',
         'password',
    ];

    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class, 'student_uuid', 'uuid');
    }
}
