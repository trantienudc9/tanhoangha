@extends('layout.default')
@section('title')
    Trang chủ
    @parent

@stop

@section('content')
    <div>
        @php
            if($product_type == 1){
                $products = config('supplies.stone');
            }elseif($product_type == 2){
                $products = config('supplies.me');
            }elseif($product_type == 3){
                $products = config('supplies.metal');
            }
        @endphp
        <div class="relative">
            <div class="multiple-items">
                <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                    <img src="{{ asset('img/bacgroundn1.jpg') }}" alt=""
                        class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                    <img src="{{ asset('img/background2.jpg') }}" alt=""
                        class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                    <img src="{{ asset('img/background3.jpg') }}" alt=""
                        class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                    <img src="{{ asset('img/background4.jpg') }}" alt=""
                        class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
            </div>
            <div class="py-4 w-full absolute z-10 bottom-0">
                <div class="mx-auto px-2 sm:px-6 lg:px-8 max-w-7xl">
                    <div class="relative z-10 top-20">
                        <h1 class="text-4xl font-bold text-teal-600 mb-4 text-center">{{ $products[$kind_product_type] }}</h1>
                        <div class="relative flex flex-col sm:flex-row items-center justify-between h-auto sm:h-16">
                            <div class="flex-grow sm:flex sm:ml-6 justify-center">
                                <div class="flex uppercase">
                                    <button id="btn-outstanding" class="dashboard-link text-2xl px-3 py-3 rounded-2xl text-sm font-medium leading-5 text-white hover:bg-red-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Sản phẩm nổi bật</button>
                                    <button id="btn-news" class="ml-4 px-3 py-3 rounded-2xl text-2xl text-sm font-medium leading-5 text-white bg-teal-500 hover:bg-red-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Sản phẩm mới</button>
                                    <button id="btn-common" class="ml-4 px-3 py-3 rounded-2xl text-2xl text-sm font-medium leading-5 text-white bg-teal-500 hover:bg-red-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Tất cả</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="opacity-85 bg-white py-20 w-full h-max absolute z-0 top-16 z-0"></div>
            </div>
        </div>

        <div class="mt-24 w-full md:w-2/3 mx-auto">
            <div class="bg-white p-4 rounded-lg shadow-lg relative min-h-40">
                <div class="mt-4 mb-4 text-center absolute right-2 top-0">
                    <input type="text" id="search-input" class="px-4 py-2 border border-gray-300 rounded-md" placeholder="Tìm kiếm sản phẩm...">
                </div>
                <div class="px-4 sm:px-8 md:px-12 lg:px-20">
                    <!-- Content Section -->
                    <div id="content" class="">
                        <div id="outstanding" class="content-item">
                            <!-- Sản phẩm nổi bật -->
                            <h3 class="text-3xl font-medium text-teal-500 mb-4">Sản phẩm nổi bật</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
                                @foreach ($typeProducts as $valProduct)
                                    @if ($valProduct->status == 2)
                                        @include('supplies.product_card')
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div id="news" class="content-item" style="display: none;">
                            <!-- Sản phẩm mới -->
                            <h3 class="text-3xl font-medium text-teal-500 mb-4">Sản phẩm mới</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
                                @foreach ($typeProducts as $valProduct)
                                    @if ($valProduct->status == 3)
                                        @include('supplies.product_card')
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div id="common" class="content-item" style="display: none;">
                            <!-- Tất cả -->
                            <h3 class="text-3xl font-medium text-teal-500 mb-4 check_find">Tất cả</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12 display_item_find">
                                @foreach ($typeProducts as $valProduct)
                                    @include('supplies.product_card')
                                @endforeach
                            </div>
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
        $(".delete_product").on("click", function(event) {
            event.preventDefault(); // Prevent default behavior of the click event
            let del = confirm("Are you sure you want to delete this holiday?");
            if (del) {
                let id = $(this).attr("d-id");
                $("#delete-product-form").attr("action", "{{ route('product.delete') }}");
                $("#delete-product-form").attr("method", "POST");
                $("#delete-product-form").append('<input type="hidden" name="id" value=' + id + '>');
                $("#delete-product-form").submit(); // Submit the form
            }
        });

        $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 2000, // Đặt autoplaySpeed thích hợp cho tốc độ muốn
            arrows: false,
            draggable: true,
            fade: true, // Áp dụng hiệu ứng fade
            speed: 3000,
            cssEase: 'linear' // Hoặc sử dụng 'ease' cho hiệu ứng mượt mà hơn
        });

        $(document).ready(function() {
            // Hiển thị mặc định nội dung "Sản phẩm nổi bật"
            $("#outstanding").show();
            // Đổi màu nền của button "Sản phẩm nổi bật" thành màu đỏ
            $("#btn-outstanding").css("background-color", "#f56565");
            // Xử lý sự kiện click cho button Sản phẩm nổi bật
            $("#btn-outstanding").click(function() {
                $(".content-item").hide(); // Ẩn tất cả các nội dung
                $("#outstanding").show();  // Hiển thị nội dung "Sản phẩm nổi bật"
                // Đổi màu nền của button "Sản phẩm nổi bật" thành màu đỏ
                $(this).css("background-color", "#f56565");
                // Đổi màu nền của các button khác thành màu teal
                $("#btn-news, #btn-common").css("background-color", "#14B8A6");
            });

            // Xử lý sự kiện click cho button Sản phẩm mới
            $("#btn-news").click(function() {
                $(".content-item").hide(); // Ẩn tất cả các nội dung
                $("#news").show();          // Hiển thị nội dung "Sản phẩm mới"
                // Đổi màu nền của button "Sản phẩm mới" thành màu đỏ
                $(this).css("background-color", "#f56565");
                // Đổi màu nền của các button khác thành màu teal
                $("#btn-outstanding, #btn-common").css("background-color", "#14B8A6");
            });

            // Xử lý sự kiện click cho button Tất cả
            $("#btn-common").click(function() {
                $('.check_find').html("Tất cả");
                $(".content-item").hide(); // Ẩn tất cả các nội dung
                $("#common").show();        // Hiển thị nội dung "Tất cả"
                // Đổi màu nền của button "Tất cả" thành màu đỏ
                $(this).css("background-color", "#f56565");
                // Đổi màu nền của các button khác thành màu teal
                $("#btn-outstanding, #btn-news").css("background-color", "#14B8A6");
            });
        });

        $(document).ready(function() {
            $("#search-input").on('input', function() {
                var searchTerm = $(this).val().trim().toLowerCase();
                // Ẩn tất cả các sản phẩm
                $(".content-item").hide();
                // Nếu searchTerm không có giá trị, chỉ hiển thị sản phẩm nổi bật
                if (searchTerm === '') {
                    $(".dashboard-link").css("background-color", "#f56565");
                    console.log("r")
                    $("#outstanding").show();
                } else {
                    // Tạo biểu thức chính quy để tìm kiếm không phân biệt chữ hoa chữ thường và hỗ trợ tiếng Việt
                    var regex = new RegExp(removeAccents(searchTerm), 'i');

                    // Hiển thị các sản phẩm có từ khóa tìm kiếm trong phần "Sản phẩm tìm kiếm"
                    $("#common .search_item").each(function() {
                        var productName = $(this).text().trim().toLowerCase();
                        if (regex.test(removeAccents(productName))) {
                            $(this).closest(".content-item").show();
                            $('.check_find').html("Sản phẩm đã tìm kiếm");
                        }
                    });
                }

                // Đặt lại màu nền của các button danh mục sản phẩm về màu teal
                $("#btn-outstanding, #btn-news, #btn-common").css("background-color", "#14B8A6");
            });

            // Hàm loại bỏ dấu từ chuỗi
            function removeAccents(str) {
                return str.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
            }
        });




    </script>
@stop

@stop
