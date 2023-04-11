<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Activiti extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = 'activities';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'activity',
        'implementation',
    ];
}
