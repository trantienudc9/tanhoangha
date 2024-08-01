<?php

namespace App\Services;

use App\Repositories\ProductTypeRepository;
use App\Repositories\KindProductTypeRepository;
use App\Models\ImageProducts;

class ProductTypeAndKindService extends BaseService
{

    protected $productType;
    protected $kindProductType;

    public function __construct(ProductTypeRepository $productType, KindProductTypeRepository $kindProductType)
    {
        $this->productType = $productType;
        $this->kindProductType = $kindProductType;
    }

    public function store($request,$product){

        if($product == 'productype'){
            return $this->productType->create($request->toArray());
        }else{
            return $this->kindProductType->create($request->toArray());
        }
    }

    public function getall($product){
        if($product == 'productype'){
            return $this->productType->all();
        }else{
            return $this->kindProductType->getAllProduct();
        }
    }

    public function getfind($id,$product){
        if($product == 'productype'){
            return $this->productType->find($id);
        }else{
            return $this->kindProductType->find($id);
        }
    }

    public function updateProduct($request,$product){

        if($product == 'productype'){
            return $this->productType->update($request->id_pd,$request->toArray());
        }else{
            return $this->kindProductType->update($request->id_pd,$request->toArray());
        }
    }

    public function deleteProduct($request,$product){
        if($product == 'productype'){
            $deleteProduct = $this->productType->delete($request->id);
            return $this->kindProductType->deleteKindProduct($request->id);
        }else{
            return $this->kindProductType->delete($request->id);
        }
    }

}
