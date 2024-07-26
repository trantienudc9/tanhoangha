<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conditioning extends Model
{
    use HasFactory;

    protected $table = "conditioning";

    protected $fillable = [
        'supplies_id',
        'capacity',
        'origin',
        'type',
        'gas_type',
        'technology',
        'warranty'
    ];
}
