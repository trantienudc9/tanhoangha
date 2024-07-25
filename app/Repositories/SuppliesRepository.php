<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Supplies;

class SuppliesRepository extends BaseRepository
{
    public function __construct(Supplies $supplies)
    {
        parent::__construct($supplies);
    }

    public function getProductItems($kind_product_type,$product_type){
            
            $supplies = Supplies::where('product_type',$product_type);
            if($kind_product_type != 0){
                $supplies->where('kind_product_type',$kind_product_type);
            }
        return $supplies->get();
    }

}
