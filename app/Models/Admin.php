<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'admins';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];
}
