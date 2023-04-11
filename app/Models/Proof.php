<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Proof extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = 'proofs';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'time',
        'activity',
        'proof',
    ];
}
