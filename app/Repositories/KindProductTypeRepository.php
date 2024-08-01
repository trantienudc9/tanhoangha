<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\KindProductType;

class KindProductTypeRepository extends BaseRepository
{
    public function __construct(KindProductType $kindProductType)
    {
        parent::__construct($kindProductType);
    }

    public function getAllProduct(){

        return KindProductType::with('productType')->orderBy('id','ASC')->get();
    }

    public function deleteKindProduct($kindProductId){

        return KindProductType::where('product_type_id',$kindProductId)->delete();
    }
}
