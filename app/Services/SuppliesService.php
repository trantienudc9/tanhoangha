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

        $this->repository->update($request->id_product,$request->toArray());
    }

}
