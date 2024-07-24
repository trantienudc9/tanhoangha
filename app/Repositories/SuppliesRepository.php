<?php
// app/Repositories/BaseRepository.php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Supplies;

class SuppliesRepository extends BaseRepository
{
    public function __construct(Supplies $supplies)
    {
        parent::__construct($supplies);
    }

    public function getProductItems($id,$product_type){

        return Supplies::where('id',$id)->where('product_type',$product_type)->get();
    }

}
