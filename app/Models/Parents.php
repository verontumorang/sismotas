<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = 'parents';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'name',
        'username',
        'password',
    ];
}
