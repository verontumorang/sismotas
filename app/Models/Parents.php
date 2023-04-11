<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasUuids;

    protected $table = 'parents';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'name',
        'username',
        'password',
    ];
}
