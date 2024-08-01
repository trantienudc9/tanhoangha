<x-app-layout>
    <div>
        <div class="relative">
            <div class="multiple-items">
                @foreach ($backgrounds as $background)
                    <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                        <img src="{{ asset($background->URL) }}" alt="" class="w-full h-full object-cover rounded-lg shadow-lg">
                    </div>
                @endforeach
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
                        <div class="lg:px-28 md:px-20">
                            @foreach ($category['subcategories'] as $subcategory)
                                @php
                                    // Lọc danh sách sản phẩm theo loại và phân loại con cụ thể
                                    $filteredSubSupplies = $filteredSupplies
                                        ->where('kind_product_type', $subcategory['kind_product_type']);
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
</x-app-layout>
