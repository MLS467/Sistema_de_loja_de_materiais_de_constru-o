<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    /** @use HasFactory<\Database\Factories\EstoqueFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "id_administrator_fk",
        "description",
        "price_unit",
        "amount",
        "active"
    ];
}