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
                        'title' => 'Sản phẩm đá',
                        'subcategories' => [['kind_product_type' => null, 'title' => 'Sản phẩm nổi bật']],
                    ],
                    [
                        'product_type' => 2,
                        'title' => 'Sản phẩm về M&E',
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

                $products = config('supplies.me');
                $kindProduct = config('supplies.status');
            @endphp

            <div class="bg-white p-4 rounded-lg shadow-lg">
                <h1 class="text-4xl font-bold text-cyan-500 mb-4 text-center">{{ $products[$id] }}</h1>
                <div class="px-28">
                    @foreach($typeProducts as $valProduct)
                        @if($valProduct->status == 2)
                            <h3 class="text-4xl font-medium text-cyan-400 mb-4">{{ $kindProduct[$valProduct->status] }}</h3>
                        @endif
                    @endforeach
                    {{-- @foreach ($category['subcategories'] as $subcategory)
                        @php
                            // Lọc danh sách sản phẩm theo loại và phân loại con cụ thể
                            $filteredSubSupplies = $filteredSupplies
                                ->where('kind_product_type', $subcategory['kind_product_type'])
                                ->where('status', 2);
                        @endphp

                        @if ($filteredSubSupplies->isNotEmpty())
                            <h3 class="text-4xl font-medium text-cyan-400 mb-4">{{ $subcategory['title'] }}</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
                                @foreach ($filteredSubSupplies as $itemSupplies)
                                    <div
                                        class="group rounded-lg hover:shadow-xl from-purple-400 via-pink-500 to-red-500 transform hover:scale-105 transition duration-300 ease-in-out">
                                        <div class="h-96">
                                            <img src="{{ asset($itemSupplies->URL) }}"
                                                alt="{{ $itemSupplies->name }}" class="w-full h-2/3 object-cover">
                                            <div class="mt-6 px-8">
                                                <h2 class="text-lg font-semibold text-gray-800">
                                                    {{ $itemSupplies->name }}</h2>
                                                <!-- Nếu cần thêm thông tin khác, bạn có thể thêm vào đây -->
                                            </div>
                                            <div class="flex justify-end mr-4 mt-4">
                                                <a
                                                    href="{{ route('product.create', ['id' => $itemSupplies->id]) }}"><i
                                                        class="fa-solid fa-pen-to-square text-yellow-400 text-xl mr-2"></i></a>
                                                <button type="button" class="delete_product"
                                                    d-id="{{ $itemSupplies->id }}">
                                                    <i class="fa-solid fa-trash-can text-red-500 text-xl"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex justify-end mb-4 mr-4">
                                            <a href="{{ route('product.detail', ['id' => $itemSupplies->id]) }}"
                                                title="chi tiết">
                                                <i
                                                    class="fa-solid fa-ellipsis text-xl transition transform hover:scale-110"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach --}}
                </div>
            </div>
            {{-- @foreach ($categories as $category)
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        <h1 class="text-4xl font-bold text-cyan-500 mb-4 text-center">{{ $products['type'] }}</h1>
                        <div class="px-28">
                            @foreach ($category['subcategories'] as $subcategory)
                                @php
                                    // Lọc danh sách sản phẩm theo loại và phân loại con cụ thể
                                    $filteredSubSupplies = $filteredSupplies
                                        ->where('kind_product_type', $subcategory['kind_product_type'])
                                        ->where('status', 2);
                                @endphp

                                @if ($filteredSubSupplies->isNotEmpty())
                                    <h3 class="text-4xl font-medium text-cyan-400 mb-4">{{ $subcategory['title'] }}</h3>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
                                        @foreach ($filteredSubSupplies as $itemSupplies)
                                            <div
                                                class="group rounded-lg hover:shadow-xl from-purple-400 via-pink-500 to-red-500 transform hover:scale-105 transition duration-300 ease-in-out">
                                                <div class="h-96">
                                                    <img src="{{ asset($itemSupplies->URL) }}"
                                                        alt="{{ $itemSupplies->name }}" class="w-full h-2/3 object-cover">
                                                    <div class="mt-6 px-8">
                                                        <h2 class="text-lg font-semibold text-gray-800">
                                                            {{ $itemSupplies->name }}</h2>
                                                        <!-- Nếu cần thêm thông tin khác, bạn có thể thêm vào đây -->
                                                    </div>
                                                    <div class="flex justify-end mr-4 mt-4">
                                                        <a
                                                            href="{{ route('product.create', ['id' => $itemSupplies->id]) }}"><i
                                                                class="fa-solid fa-pen-to-square text-yellow-400 text-xl mr-2"></i></a>
                                                        <button type="button" class="delete_product"
                                                            d-id="{{ $itemSupplies->id }}">
                                                            <i class="fa-solid fa-trash-can text-red-500 text-xl"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="flex justify-end mb-4 mr-4">
                                                    <a href="{{ route('product.detail', ['id' => $itemSupplies->id]) }}"
                                                        title="chi tiết">
                                                        <i
                                                            class="fa-solid fa-ellipsis text-xl transition transform hover:scale-110"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach --}}

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
