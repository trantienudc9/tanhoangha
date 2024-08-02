<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductType;

class ProductTypeRepository extends BaseRepository
{
    public function __construct(ProductType $productType)
    {
        parent::__construct($productType);
    }

    public function getAllProductOtimize(){

        return ProductType::with(['kinds.supplies'])->get();
    }
}
