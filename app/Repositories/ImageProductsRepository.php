<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\ImageProducts;

class ImageProductsRepository extends BaseRepository
{
    public function __construct(ImageProducts $imageProducts)
    {
        parent::__construct($imageProducts);
    }

    public function backgrounds($id_kind_background){

        return ImageProducts::where('id_kind_background',$id_kind_background)->get();
    }

    public function oderByAll(){

        return ImageProducts::orderBy('id_kind_background','ASC')->get();
    }
}
