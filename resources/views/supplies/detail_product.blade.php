@extends('layout.default')
@section('title')
    Trang chủ
    @parent

@stop

@section('content')
    <div>
        <div class="bg-white p-4 m-auto max-w-screen-xl rounded-lg shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="md:col-span-1">
                    <img src="{{ asset($detailProduct->URL) }}" alt="Product Image" class="w-full rounded-lg hover:shadow-lg">
                </div>
                <div class="md:col-span-2">
                    <div class="flex items-center justify-between">
                        <h2 class="text-3xl font-semibold mb-2">{{$detailProduct->name}}</h2>
                        <div class="relative" title="Bổ sung thông số">
                            <a href="">
                                <button class="rounded-full bg-blue-500 text-white p-2 hover:bg-blue-600 transition duration-200 focus:outline-none">
                                    <i class="fa-solid fa-plus text-lg"></i>
                                </button>
                                <span class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 block h-2.5 w-2.5 bg-red-500 rounded-full"></span>
                            </a>
                        </div>
                    </div>
                    <hr class="my-2 border-gray-300">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="col-span-2 space-y-2">
                            <div class="flex items-start space-x-2">
                                <span class="inline-block w-2 h-2 bg-blue-500 rounded-full mt-1"></span>
                                <p class="text-sm md:text-base"><strong>Công suất:</strong> 17.100 (Btu/h)</p>
                            </div>
                            <div class="flex items-start space-x-2">
                                <span class="inline-block w-2 h-2 bg-blue-500 rounded-full mt-1"></span>
                                <p class="text-sm md:text-base"><strong>Tbương hiệu:</strong> {{ $detailProduct->type }}</p>
                            </div>
                            <div class="flex items-start space-x-2">
                                <span class="inline-block w-2 h-2 bg-blue-500 rounded-full mt-1"></span>
                                <p class="text-sm md:text-base"><strong>Xuất xứ:</strong> Thái Lan</p>
                            </div>
                            <div class="flex items-start space-x-2">
                                <span class="inline-block w-2 h-2 bg-blue-500 rounded-full mt-1"></span>
                                <p class="text-sm md:text-base"><strong>Loại máy:</strong> 2 chiều lạnh/ sưởi</p>
                            </div>
                            <div class="flex items-start space-x-2">
                                <span class="inline-block w-2 h-2 bg-blue-500 rounded-full mt-1"></span>
                                <p class="text-sm md:text-base"><strong>Loại gas:</strong> R32</p>
                            </div>
                            <div class="flex items-start space-x-2">
                                <span class="inline-block w-2 h-2 bg-blue-500 rounded-full mt-1"></span>
                                <p class="text-sm md:text-base"><strong>Công nghệ:</strong> Inverter</p>
                            </div>
                            <div class="flex items-start space-x-2">
                                <span class="inline-block w-2 h-2 bg-blue-500 rounded-full mt-1"></span>
                                <p class="text-sm md:text-base"><strong>Bảo hành:</strong> 12 tháng</p>
                            </div>
                            <hr>
                        </div>
                        <div class="mt-4 md:mt-0 space-y-4 md:col-span-1">
                            <div class="flex items-center space-x-2">
                                <button class="rounded-full bg-blue-500 text-white p-2 hover:bg-blue-600 transition duration-200">
                                    <i class="fa-solid fa-phone-volume"></i>
                                </button>
                                <a href="tel:0337444552" class="text-blue-500">0337444552</a>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="rounded-full bg-blue-500 text-white p-2 hover:bg-blue-600 transition duration-200">
                                    <i class="fa-brands fa-facebook"></i>
                                </button>
                                <a href="https://facebook.com/trantienduc" class="text-blue-500">Trần Tiến Đức</a>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="rounded-full bg-blue-500 text-white p-2 hover:bg-blue-600 transition duration-200">
                                    <i class="fa-solid fa-z"></i>
                                </button>
                                <a href="#" class="text-blue-500">Vật liệu xây dựng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h3 class="text-xl font-semibold mb-2">Giới thiệu: {{$detailProduct->name}}</h3>
                <p class="text-sm md:text-base leading-relaxed">
                    Dòng điều hòa Daikin là một trong những sản phẩm ăn khách trên thị trường hiện nay. Không chỉ có mức giá hấp dẫn, sản phẩm còn có nhiều dòng điều hòa để các bạn lựa chọn. Điều hòa treo tường Daikin 2 chiều Inverter FTHF50RVMV/RHF50RVMV cũng là một trong những gợi ý hoàn hảo cho bạn nếu đang có ý định chọn mua điều hòa.
                </p>
            </div>
        </div>

    </div>
    <form action="" id="delete-product-form">
        @csrf
        @method('DELETE')
    </form>



@section('script')


    <!-- Thêm các tài nguyên JavaScript của bạn tại đây -->
    <script type="text/javascript">

    </script>
@stop

@stop
