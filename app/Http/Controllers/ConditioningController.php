<?php

namespace App\Http\Controllers;

use App\Services\ConditioningService;
use Illuminate\Http\Request;

class ConditioningController extends Controller
{
    protected $conditioningService;

    public function __construct(ConditioningService $conditioningService) {
        $this->conditioningService = $conditioningService;
    }
    public function parameters($id){
        $parameter = $this->conditioningService->getFindSupplies($id);
        $data = compact('id','parameter');

        return view('parameters.form_conditioning',$data);
    }

    public function store_conditioning(Request $request){

        $this->conditioningService->acConfiguration($request);

        return redirect()->back();
    }
}
