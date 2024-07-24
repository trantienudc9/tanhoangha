<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\SuppliesService;

class SuppliesController extends Controller
{

    protected $suppliesService;

    public function __construct(SuppliesService $suppliesService)
    {
        $this->suppliesService = $suppliesService;
    }
    public function index()
    {

        $supplies = $this->suppliesService->all();

        $data = compact('supplies');

        return view('supplies.index',$data);
    }

    public function create_product($id = null)
    {
        $dataSupplies = $this->suppliesService->find($id);

        $data = compact('dataSupplies');

        return view('supplies.create_product',$data);
    }

    public function store_product(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'product_type' => 'required|integer',
            'status' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra hình ảnh có hợp lệ không
        ]);

        $this->suppliesService->storeProduct($request);

        return redirect()->back();
    }

    public function update_product(Request $request){

        $this->suppliesService->updateProduct($request);

        return redirect()->back();
    }

    public function delete_product(Request $request){

        $this->suppliesService->delete($request->id);

        return redirect()->back();
    }

    public function detail_product($id = null){

        $detailProduct = $this->suppliesService->find($id);

        $data = compact('detailProduct');

        return view('supplies.detail_product',$data);
    }

    public function items_products($id=null,$product_type=null){
        
        $typeProducts = $this->suppliesService->getTypeProducts($id,$product_type);
        dd($typeProducts);
        $data = compact('typeProducts','id');
        
        return view('supplies.items_products',$data);
    }
}
