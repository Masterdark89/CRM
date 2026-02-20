<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    protected $table = 'stock';

    protected $fillable = [
        'sku',
        'descripcion',
        'cantidad',
        'ubicacion',
    ];

    public $timestamps = true;
}
