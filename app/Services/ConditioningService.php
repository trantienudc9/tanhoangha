<?php

namespace App\Services;

use App\Repositories\ConditioningRepository;
use App\Models\Conditioning;

class ConditioningService extends BaseService
{

    protected $repository;

    public function __construct(ConditioningRepository $repository)
    {
        $this->repository = $repository;
    }

    public function acConfiguration($request){
        $check = $this->repository->existenceCheck($request->supplies_id);

        if(!$check){
            $this->create($request->toArray());
        }else{
            $this->repository->updateExistenceCheck($request->supplies_id,$request);
        }
    }

    public function getFindSupplies($supplies_id){

        return $this->repository->findSupplies($supplies_id);
    }
}
