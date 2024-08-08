<x-app-layout>
    <div>
        <div class="relative">
            <div class="multiple-items min-h-28">
                @foreach ($backgrounds as $background)
                    <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                        <img src="{{ asset($background->URL) }}" alt="lỗi"
                            class="w-full h-full object-cover rounded-lg shadow-lg">
                    </div>
                @endforeach
            </div>
            <div class="py-4 w-full absolute z-10 bottom-0">
                <div class="mx-auto px-2 sm:px-6 lg:px-8 max-w-7xl">
                    <div class="relative z-10 top-20">
                        <h1 class="text-4xl font-bold text-teal-600 mb-4 text-center">{{ $productKind->name }}</h1>
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
                <div class="px-4 sm:px-8 md:px-12 lg:px-8">
                    <!-- Content Section -->
                    <div id="content" class="">
                        <div id="outstanding" class="content-item">
                            <!-- Sản phẩm nổi bật -->
                            <h3 class="text-3xl font-medium text-teal-500 mb-4">Sản phẩm nổi bật</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
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
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
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
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 display_item_find">
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

</x-app-layout>
@vite(['resources/js/pages/items_products.js'])
