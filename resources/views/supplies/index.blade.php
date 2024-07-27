@extends('layout.default')
@section('title')
    Trang chủ
    @parent

@stop

@section('content')
    <div>
        <div class="relative">
            <div class="multiple-items">
                <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                    <img src="{{ asset('img/bacgroundn1.jpg') }}" alt="" class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                    <img src="{{ asset('img/background2.jpg') }}" alt="" class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                    <img src="{{ asset('img/background3.jpg') }}" alt="" class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                    <img src="{{ asset('img/background4.jpg') }}" alt="" class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
            </div>
        </div>

        <div>
            @php
                // Tạo một mảng các danh mục sản phẩm với các thông tin cần hiển thị
                $categories = [
                    [
                        'product_type' => 1,
                        'title' => 'SẢN PHẨM VỀ ĐÁ',
                        'subcategories' => [
                            ['kind_product_type' => 1, 'title' => 'Đá ốp lát'],
                            ['kind_product_type' => 2, 'title' => 'Lưới thép xây dựng'],
                            ['kind_product_type' => 3, 'title' => 'Hàng rào Nhựa lõi thép'],
                        ],
                    ],
                    [
                        'product_type' => 2,
                        'title' => 'SẢN PHẨM VỀ M&E',
                        'subcategories' => [
                            ['kind_product_type' => 1, 'title' => 'Điều hòa'],
                            ['kind_product_type' => 2, 'title' => 'Ống thông gió'],
                            ['kind_product_type' => 3, 'title' => 'Máy lọc không khí'],
                        ],
                    ],
                    [
                        'product_type' => 3,
                        'title' => 'VẬT TƯ KIM KHÍ & TIÊU HAO NHÀ MÁY',
                        'subcategories' => [
                            ['kind_product_type' => 1, 'title' => 'Bulong inox'],
                            ['kind_product_type' => 2, 'title' => 'Đá cắt đá mài'],
                            ['kind_product_type' => 3, 'title' => 'Dầu cắt gọt'],
                            ['kind_product_type' => 4, 'title' => 'Vật tư thiết bị phòng sạch'],
                        ],
                    ],
                ];
            @endphp

            @foreach ($categories as $category)
                @php
                    // Lọc danh sách sản phẩm theo loại và phân loại con
                    $filteredSupplies = $supplies->where('product_type', $category['product_type']);
                @endphp

                @if ($filteredSupplies->isNotEmpty())
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        <h1 class="text-4xl font-bold text-teal-500 mb-4 text-center">{{ $category['title'] }}</h1>
                        <div class="px-28">
                            @foreach ($category['subcategories'] as $subcategory)
                                @php
                                    // Lọc danh sách sản phẩm theo loại và phân loại con cụ thể
                                    $filteredSubSupplies = $filteredSupplies
                                        ->where('kind_product_type', $subcategory['kind_product_type'])
                                        ->where('status', 2);
                                @endphp

                                @if ($filteredSubSupplies->isNotEmpty())
                                    <h3 class="text-4xl font-medium text-teal-400 mb-4">{{ $subcategory['title'] }}</h3>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
                                        @foreach ($filteredSubSupplies as $valProduct)
                                            @include('supplies.product_card')
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

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

    </script>
@stop

@stop
