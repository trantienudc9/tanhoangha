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
    
    public function getBgKinds(){
        return ImageProducts::with('kindProductType')->orderBy('id_kind_background','ASC')->get();
    }

    public function getAllImage($kind_product_type){

        return ImageProducts::where('id_kind_background',$kind_product_type)->get();
    }
}
