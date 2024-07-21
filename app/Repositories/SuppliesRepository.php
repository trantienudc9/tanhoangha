<?php
// app/Repositories/BaseRepository.php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Supplies;

class SuppliesRepository extends BaseRepository
{
    public function __construct(Supplies $supplies)
    {
        parent::__construct($supplies);
    }

}
