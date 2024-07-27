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

}
