<?php

namespace App\Services;

use App\Repositories\ImageProductsRepository;
use App\Models\ImageProducts;

class ImageProductsService extends BaseService
{

    protected $repository;

    public function __construct(ImageProductsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function storeBackground($request){
        // Xử lý lưu trữ ảnh nếu có
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'supplies'.time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $request['URL'] = '/uploads/' . $fileName; // Lưu URL của ảnh vào cơ sở dữ liệu
        }
        if($request->id_background){
            return $this->repository->update($request->id_background,$request->toArray());
        }else{
            return $this->repository->create($request->toArray());
        }
    }

    public function getAll(){

        return $this->repository->getBgKinds();
    }

    public function backgroundFind($kind_product_type){
        
        return $this->repository->getAllImage($kind_product_type);
    }

}
