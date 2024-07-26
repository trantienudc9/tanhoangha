<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'product_type',
        'kind_product_type',
        'status',
        'URL',
        'parameters',
        'product_introduction'
    ];

}
