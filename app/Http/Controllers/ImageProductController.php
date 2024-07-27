<?php

namespace App\Http\Controllers;
use App\Services\ImageProductsService;
use Illuminate\Http\Request;
use App\Http\Requests\BackgroundRequest;

class ImageProductController extends Controller
{
    protected $imageProductsService;

    public function __construct(ImageProductsService $imageProductsService)
    {
        $this->imageProductsService = $imageProductsService;
    }

    public function add_background($id = null){

        $backgrounds = $this->imageProductsService->all();
        $itemBackground = $this->imageProductsService->find($id);

        $data = compact('backgrounds','itemBackground');

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
}
