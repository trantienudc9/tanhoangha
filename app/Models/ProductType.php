<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $table = 'product_type';

    protected $fillable = [
        'name',
    ];

    public function kinds()
    {
        return $this->hasMany(KindProductType::class, 'product_type_id');
    }
}
