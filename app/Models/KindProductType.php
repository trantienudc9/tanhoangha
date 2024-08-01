<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KindProductType extends Model
{
    use HasFactory;

    protected $table = 'kind_product_type';

    protected $fillable = [
        'product_type_id',
        'name',
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}
