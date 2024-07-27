<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SuppliesService;
use App\Http\Requests\SuppliesProductRequest;
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

    public function store_product(SuppliesProductRequest $request)
    {
        $this->suppliesService->storeProduct($request);

        return redirect()->route('product.index');
    }

    public function update_product(SuppliesProductRequest $request){

        $this->suppliesService->updateProduct($request);

        return redirect()->route('product.index');
    }

    public function delete_product(Request $request){

        $this->suppliesService->delete($request->id);

        return redirect()->back();
    }

    protected function renderProductView($viewName, $id = null) {
        $detailProduct = $this->suppliesService->find($id);
        return view($viewName, compact('detailProduct'));
    }

    public function detail_product($id = null) {
        return $this->renderProductView('supplies.detail_product', $id);
    }

    public function parameters($id = null) {
        return $this->renderProductView('supplies.parameters', $id);
    }

    public function items_products($kind_product_type=null,$product_type=null){

        $typeProducts = $this->suppliesService->getTypeProducts($kind_product_type,$product_type);

        $data = compact('typeProducts','kind_product_type','product_type');

        return view('supplies.items_products',$data);
    }

    public function update_parameters(Request $request){

        $save = $this->suppliesService->updateParameters($request);

        return 1;
    }
}
