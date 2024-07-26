<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Conditioning;

class ConditioningRepository extends BaseRepository
{
    public function __construct(Conditioning $conditioning)
    {
        parent::__construct($conditioning);
    }

    public function existenceCheck($supplies_id){

        return Conditioning::where('supplies_id',$supplies_id)->first();
    }

    public function updateExistenceCheck($supplies_id,$request){
        $data = [
            "capacity" => $request->capacity,
            "origin" => $request->origin,
            "type" => $request->type,
            "gas_type" => $request->gas_type,
            "technology" => $request->technology,
            "warranty" => $request->warranty
        ];
        return Conditioning::where("supplies_id",$supplies_id)->update($data);
    }

    public function findSupplies($supplies_id){

        return Conditioning::where("supplies_id",$supplies_id)->first();
    }
}
