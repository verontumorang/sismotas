<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'attendances';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'student_uuid',
        'schedule_uuid',
        'attend',
        'sick',
        'no_reason',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_uuid', 'uuid');
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedule_uuid', 'uuid');
    }
}
