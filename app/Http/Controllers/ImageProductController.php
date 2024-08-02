<?php

namespace App\Http\Controllers;
use App\Services\ImageProductsService;
use Illuminate\Http\Request;
use App\Http\Requests\BackgroundRequest;
use App\Models\KindProductType;
class ImageProductController extends Controller
{
    protected $imageProductsService;

    public function __construct(ImageProductsService $imageProductsService)
    {
        $this->imageProductsService = $imageProductsService;
    }

    public function add_background($id = null){

        $backgrounds = $this->imageProductsService->getAll();
        $itemBackground = $this->imageProductsService->find($id);
        $productKinds = KindProductType::all();

        $data = compact('backgrounds','itemBackground','productKinds');

        return view('background.add_background',$data);
    }

    public function store_background(BackgroundRequest $request){

        $this->imageProductsService->storeBackground($request);

        return redirect()->back()->with('success', 'Ảnh nền đã được tạo thành công!');
    }

    public function update_background(Request $request){

        $this->imageProductsService->storeBackground($request);

        return redirect()->route('image.background')->with('success', 'Ảnh nền đã được cập nhật thành công!');
    }

    public function delete_background(Request $request){

        $this->imageProductsService->delete($request->id);

        return redirect()->back()->with('delete', 'Ảnh nền đã được cập nhật thành công!');
    }
}
