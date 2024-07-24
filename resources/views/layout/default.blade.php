<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Laravel')
    </title>
    <link rel="icon" href="{{ asset('img/logo.jpg') }}" type="image/jpg">
    {{-- <link rel="stylesheet" href="{{ asset('library/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('library/fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-100">
    {{-- <h1 class="text-3xl font-bold underline">
        Hello world!
      </h1> --}}
    <div id="app">
        <div class="relative">
            <nav class="bg-teal-500 text-white py-4 px-1.5">
                <div class="container mx-auto flex justify-between items-center">
                    <!-- Logo -->
                    <div class="ml-4">
                        <a href="{{ route('product.index') }}" class="flex items-center">
                            <img src="{{ asset('img/logo.jpg') }}" alt="" class="h-8">
                        </a>
                    </div>
                    <!-- Menu -->
                    <ul class="flex space-x-4">
                        <li><a href="{{ route('product.create') }}" class="hover:text-gray-200">Thêm sản phẩm</a></li>
                        <li><a href="#" class="hover:text-gray-200">Giới thiệu</a></li>
                        <li><a href="#" class="hover:text-gray-200 display_product relative before:content-[''] hover:before:block before:hidden before:w-20 before:h-8 before:absolute before:top-full before:left-0">Sản phẩm</a></li>
                        <li><a href="#" class="hover:text-gray-200">Lĩnh vực kinh doanh</a></li>
                        <li><a href="#" class="hover:text-gray-200">Tin tức</a></li>
                        <li><a href="#" class="hover:text-gray-200">Thư viện</a></li>
                        <li><a href="#" class="hover:text-gray-200">Tuyển dụng</a></li>
                        <li><a href="#" class="hover:text-gray-200">Liên hệ</a></li>
                    </ul>

                    <!-- Search bar -->
                    <div class="flex items-center space-x-4 relative">
                        <div class="relative">
                            <input type="text" placeholder="Tìm kiếm..."
                                class="py-1 px-3 bg-white text-white border border-teal-400 rounded-md focus:outline-none focus:border-teal-600">
                            <button class="absolute right-0 top-0 mt-1 mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-teal-400" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M15.293 13.707a1 1 0 0 1-1.414 1.414l-3.717-3.717a5.5 5.5 0 1 1 1.414-1.414l3.717 3.717zm-.707.707a7.5 7.5 0 1 0-10.606-10.606 7.5 7.5 0 0 0 10.606 10.606z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!-- Auth buttons -->
                        <div>
                            <a href="#" class="py-2 px-4 bg-teal-700 text-white rounded-md hover:bg-teal-600">Đăng
                                nhập</a>
                            <a href="#" class="py-2 px-4 bg-teal-800 text-white rounded-md hover:bg-teal-900">Đăng
                                ký</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="bg-white w-full md:w-7/12 py-4 px-4 mx-auto opacity-90 absolute z-40 left-48 hidden show_product">
                <div class="grid css_effect grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="col-span-1 width_effect">
                        <a href="#" class="block text-black font-bold text-lg mb-2 transition-transform transform hover:scale-105">SẢN PHẨM VỀ ĐÁ</a>
                        <hr class="my-2">
                        <ul class="leading-10">
                            <li>
                                <a href="" class="text-black">Sản phẩm nổi bật</a>
                                <hr class="effect hidden">
                            </li>
                            <li>
                                <a href="#" class="text-black">Sản phẩm mới</a>
                                <hr class="effect hidden">
                            </li>
                            <li>
                                <a href="#" class="text-black">Tất cả</a>
                                <hr class="effect hidden">
                            </li>
                        </ul>
                    </div>
                    <div class="col-span-1">
                        <a href="#" class="block font-bold text-black text-lg mb-2 transition-transform transform hover:scale-105">Sản phẩm về M&E</a>
                        <hr class="my-2">
                        <ul class="leading-10">
                            @foreach(config('supplies.me') as $id=>$itemMe)
                            <li>
                                <a href="{{ route('product.items', ['kind_product_type' => $id, 'product_type' => 2]) }}" class="text-black">{{ $itemMe }}</a>
                                <hr class="effect hidden">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-span-1">
                        <a href="#" class="block font-bold text-lg text-black mb-2 transition-transform transform hover:scale-105">VẬT TƯ KIM KHÍ & TIÊU HAO NHÀ MÁY</a>
                        <hr class="my-2">
                        <ul class="leading-10">
                            @foreach(config('supplies.metal') as $itemMetal)
                            <li>
                                <a href="{{ route('product.items', ['kind_product_type' => $id, 'product_type' => 2]) }}" class="text-black">{{ $itemMetal }}</a>
                                <hr class="effect hidden">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <main class="py-4">

            @yield('content')
        </main>
        <footer class="bg-teal-500 text-gray-100">
            <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Column 1: Logo and Contact Info -->
                    <div class="col-span-1 md:col-span-1">
                        <h3 class="text-lg font-semibold mb-4">Liên hệ</h3>
                        <p class="mb-2"><i class="fa-solid fa-map-marker-alt mr-2 text-blue-500"></i>123 Đường ABC,
                            Quận XYZ, TP. HCM</p>
                        <p class="mb-2"><i class="fa-solid fa-phone-alt mr-2 text-blue-500"></i><a
                                href="tel:+123456789">(+84) 123 456 789</a></p>
                        <p class="mb-2"><i class="fa-solid fa-envelope mr-2 text-blue-500"></i><a
                                href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                    <!-- Column 2: Quick Links -->
                    <div class="col-span-1 md:col-span-1">
                        <h3 class="text-lg font-semibold mb-4">Liên kết nhanh</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="hover:text-blue-500">Giới thiệu</a></li>
                            <li><a href="#" class="hover:text-blue-500">Sản phẩm</a></li>
                            <li><a href="#" class="hover:text-blue-500">Dịch vụ</a></li>
                            <li><a href="#" class="hover:text-blue-500">Bài viết</a></li>
                        </ul>
                    </div>
                    <!-- Column 3: Social Links -->
                    <div class="col-span-1 md:col-span-1">
                        <h3 class="text-lg font-semibold mb-4">Mạng xã hội</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-blue-500 hover:text-black"><i
                                    class="fa-brands fa-facebook"></i></a>
                            <a href="#" class="text-blue-500 hover:text-black"><i
                                    class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="text-blue-500 hover:text-black"><i
                                    class="fa-brands fa-instagram"></i></a>
                            <a href="#" class="text-blue-500 hover:text-black"><i
                                    class="fa-brands fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Copyright -->
                <div class="mt-8 border-t border-gray-700 pt-4 text-center text-sm">
                    <p>&copy; 2024 Tên Công ty. Tất cả các quyền được bảo lưu.</p>
                </div>
            </div>
        </footer>


        {{-- <script src="{{ asset('library/bootstrap-5.3.3-dist/js/bootstrap.min.js') }}"></script> --}}
        <script src="{{ asset('library/fontawesome-free-6.6.0-web/js/all.min.js') }}"></script>
        <script src="{{ asset('library/jquery-3.7.1.js') }}"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        @yield('script')
        <script>
            $(document).ready(function() {
                $('.display_product, .show_product').hover(function() {
                    $('.show_product').stop().fadeIn(600);;
                }, function() {
                    $('.show_product').stop().fadeOut(600);;
                });
            });

            $(document).ready(function() {
            // Khi di chuột vào các liên kết <a> trong .css_effect
            $('.css_effect a').hover(function() {
                // Lấy chiều rộng của liên kết <a>
                var width = $('.width_effect').outerWidth();

                // Hiển thị gạch chân (hr), thiết lập chiều rộng và màu sắc đỏ
                $(this).next('.effect').removeClass('hidden').stop().css({
                    'width': '0',
                    'height': '3px',
                    'background-color': '#14B8A6' // Màu đỏ
                }).animate({width: width}, 300);
            }, function() {
                // Khi di chuột ra khỏi các liên kết <a>, ẩn gạch chân (hr)
                $(this).next('.effect').stop().animate({width: '0'}, 300, function() {
                    $(this).addClass('hidden');
                });
            });
        });




        </script>
    </div>
</body>

</html>
