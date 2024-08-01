<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SuppliesService;
use App\Http\Requests\SuppliesProductRequest;
use App\Services\ImageProductsService;
use App\Models\ProductType;
use App\Models\KindProductType;
use App\Services\ProductTypeAndKindService;
use Illuminate\Support\Facades\Auth;
// use Spatie\Permission\Models\Role;
class SuppliesController extends Controller
{

    protected $suppliesService;
    protected $imageProductsService;
    protected $productTypeAndKindService;

    public function __construct(SuppliesService $suppliesService, ImageProductsService $imageProductsService, ProductTypeAndKindService $productTypeAndKindService)
    {
        $this->suppliesService = $suppliesService;
        $this->imageProductsService = $imageProductsService;
        $this->productTypeAndKindService = $productTypeAndKindService;
        view()->share('productTypes', ProductType::with(['kinds.supplies'])->get());
    }
    public function index()
    {
        // $user = Auth::user();
        // $user->assignRole('admin');

        // $role = Role::create(['name' => 'writer']);

        $supplies = $this->suppliesService->getProductOutstanding();

        $backgrounds = $this->imageProductsService->getbackground(1);

        $data = compact('supplies','backgrounds');

        return view('supplies.index',$data);
    }

    public function create_product($id = null)
    {
        $dataSupplies = $this->suppliesService->find($id);
        $products = ProductType::all();
        $productKinds = KindProductType::all();

        $data = compact('dataSupplies','products','productKinds');

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
        $id_kind_background = $product_type.$kind_product_type;
        $backgrounds = $this->imageProductsService->getbackground($id_kind_background);

        $data = compact('typeProducts','kind_product_type','product_type','backgrounds');

        return view('supplies.items_products',$data);
    }

    public function update_parameters(Request $request){

        $save = $this->suppliesService->updateParameters($request);

        return 1;
    }

    public function introduce_products(){

        $backgrounds = $this->imageProductsService->getbackground(1);

        $data = compact('backgrounds');
        return view('supplies.introduce',$data);
    }

    public function recruitment_products(){

        $backgrounds = $this->imageProductsService->getbackground(1);

        $data = compact('backgrounds');
        return view('supplies.recruitment',$data);
    }

    public function contact_products(){
        $backgrounds = $this->imageProductsService->getbackground(1);

        $data = compact('backgrounds');
        return view('supplies.contact',$data);
    }
}
