<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductTypeAndKindService;
use App\Http\Requests\ProductTypeRequest;
use App\Http\Requests\KindProducRequest;

class ProductTypeAndKindController extends Controller
{
    protected $productTypeAndKindService;

    public function __construct(ProductTypeAndKindService $productTypeAndKindService)
    {
        $this->productTypeAndKindService = $productTypeAndKindService;
    }

    public function indexProductTypes($id = null){
        
        $product = 'productype';
        $getFindProduct = $this->productTypeAndKindService->getfind($id,$product);
        $productTypes = $this->productTypeAndKindService->getall($product);
        $data = compact('productTypes','getFindProduct');

        return view('productTypeAndKind.product_types.index',$data);
    }

    public function storeProductType(ProductTypeRequest $request)
    {
        $product = 'productype';

        $this->productTypeAndKindService->store($request,$product);
        return redirect()->back()->with('success', 'Tạo loại sản phẩm thành công!');
    }

    public function updateProductType(ProductTypeRequest $request){

        $product = 'productype';

        $this->productTypeAndKindService->updateProduct($request,$product);
        return redirect()->route('product-types.index')->with('success', 'Cập nhật loại sản phẩm thành công!');

    }

    public function destroyProductType(Request $request){

        $product = 'productype';

        $this->productTypeAndKindService->deleteProduct($request,$product);
        return redirect()->back()->with('success', 'Xóa loại sản phẩm thành công!');

    }

    public function indexKindProductTypes($id = null){

        $product = 'kind';
        $flexible = 'productype';
        $getFindProduct = $this->productTypeAndKindService->getfind($id,$product);
        $productTypes = $this->productTypeAndKindService->getall($product);
        $listProduct = $this->productTypeAndKindService->getall($flexible);
        $data = compact('productTypes','getFindProduct','id','listProduct');

        return view('productTypeAndKind.kind_product_types.index',$data);
    }

    public function storeKindProductType(KindProducRequest $request)
    {
        $product = 'kind';

        $this->productTypeAndKindService->store($request,$product);
        return redirect()->back()->with('success', 'Tạo loại sản phẩm thành công!');
    }

    public function updateKindProductType(KindProducRequest $request){

        $product = 'kind';

        $this->productTypeAndKindService->updateProduct($request,$product);
        return redirect()->route('kind-product-types.index')->with('success', 'Cập nhật loại sản phẩm thành công!');

    }
    
    public function destroyKindProductType(Request $request){

        $product = 'kind';

        $this->productTypeAndKindService->deleteProduct($request,$product);
        return redirect()->back()->with('success', 'Xóa loại sản phẩm thành công!');

    }
    
}
