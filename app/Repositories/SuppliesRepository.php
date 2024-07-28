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

        return Supplies::where('kind_product_type',$kind_product_type)->where('product_type',$product_type)->get();
    }

    public function statusOutstanding(){
        return Supplies::where('status',2)->get();
    }

}
