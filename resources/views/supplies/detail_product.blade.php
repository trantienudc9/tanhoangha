@extends('layout.default')
@section('title')
    Trang chủ
    @parent

@stop

@section('content')
    <div>
        <div>
            <div class="bg-white p-4 m-auto max-w-screen-2xl rounded-lg shadow-lg grid grid-cols-3 gap-4">
                <div class="col-span-1">
                    <img src="{{ asset($detailProduct->URL) }}" alt="error">
                </div>
                <div class="col-span-2">
                    <h2 class="text-3xl font-semibold mb-2">{{$detailProduct->name}}</h2>
                    <hr class="my-2 border-gray-300">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="flex flex-wrap gap-2 col-span-2">
                            <div class="w-full ">
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-circle w-1.5"></i>
                                    <p class="text-sm text-xl"><strong>Công suất:</strong> 17.100 (Btu/h)</p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-circle w-1.5"></i>
                                    <p class="text-sm text-xl"><strong>Xuất xứ:</strong> Thái Lan</p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-circle w-1.5"></i>
                                    <p class="text-sm text-xl"><strong>Loại máy:</strong> 2 chiều lạnh/ sưởi</p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-circle w-1.5"></i>
                                    <p class="text-sm text-xl"><strong>Loại gas:</strong> R32</p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-circle w-1.5"></i>
                                    <p class="text-sm text-xl"><strong>Công nghệ:</strong> Inverter</p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-circle w-1.5"></i>
                                    <p class="text-sm text-xl"><strong>Bảo hành:</strong> 12 tháng</p>
                                </div>                             
                                
                                
                            </div>
                        </div>
                        <div class="mt-4 gap-4 col-span-1">
                            <div>
                                <button class="rounded-full bg-blue-500 text-white p-2 hover:bg-blue-600 transition duration-200">
                                    <i class="fa-solid fa-phone-volume"></i>
                                </button>
                            </div>
                            <div>
                                <button class="rounded-full bg-blue-500 text-white p-2 hover:bg-blue-600 transition duration-200">
                                    <i class="fa-brands fa-facebook"></i>
                                </button>
                            </div>
                            <div>
                                <button class="rounded-full bg-blue-500 text-white p-2 hover:bg-blue-600 transition duration-200">
                                    <i class="fa-solid fa-z"></i>
                                </button>

                            </div>
                        </div>
                    </div>
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
