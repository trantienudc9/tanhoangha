<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductType;
use App\Models\KindProductType;

class ProductTypeRepository extends BaseRepository
{
    public function __construct(ProductType $productType)
    {
        parent::__construct($productType);
    }
}
