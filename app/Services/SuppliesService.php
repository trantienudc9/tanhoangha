<?php

namespace App\Services;

use App\Repositories\SuppliesRepository;
use App\Models\Supplies;

class SuppliesService extends BaseService
{

    protected $repository;

    public function __construct(SuppliesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function storeProduct($request){

        // Xử lý lưu trữ ảnh nếu có
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'supplies'.time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $request['URL'] = '/uploads/' . $fileName; // Lưu URL của ảnh vào cơ sở dữ liệu
        }

        // Sử dụng DB facade để chèn dữ liệu vào bảng 'tanhoangha'
        $this->repository->create($request->toArray());
    }

    public function updateProduct($request){
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'supplies'.time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $request['URL'] = '/uploads/' . $fileName; // Lưu URL của ảnh vào cơ sở dữ liệu
        }

        if(!$request->kind_product_type){
            $request['kind_product_type'] = null;
        }

        $this->repository->update($request->id_product,$request->toArray());
    }

    public function getTypeProducts($kind_product_type,$product_type){

        return $this->repository->getProductItems($kind_product_type,$product_type);
    }

    public function updateParameters($request){

        $field = $request->check == 1 ? 'parameters' : 'product_introduction';

        $data = [
            $field => $request->content
        ];

        return $this->update($request->id,$data);
    }

}
