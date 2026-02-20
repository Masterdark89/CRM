<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';

    protected $fillable = [
        'nombre',
        'email',
        'cargo',
        'telefono',
        'activo',
    ];

    public $timestamps = true;
}
