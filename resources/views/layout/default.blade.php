<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Laravel')</title>
    {{-- <link rel="stylesheet" href="{{ asset('library/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('library/fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100">
    {{-- <h1 class="text-3xl font-bold underline">
        Hello world!
      </h1> --}}
    <div id="app">
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
                    <li><a href="#" class="hover:text-gray-200">Sản phẩm</a></li>
                    <li><a href="#" class="hover:text-gray-200">Lĩnh vực kinh doanh</a></li>
                    <li><a href="#" class="hover:text-gray-200">Tin tức</a></li>
                    <li><a href="#" class="hover:text-gray-200">Thư viện</a></li>
                    <li><a href="#" class="hover:text-gray-200">Tuyển dụng</a></li>
                    <li><a href="#" class="hover:text-gray-200">Liên hệ</a></li>
                </ul>

                <!-- Search bar -->
                <div class="flex items-center space-x-4 relative">
                    <div class="relative">
                        <input type="text" placeholder="Tìm kiếm..." class="py-1 px-3 bg-white text-white border border-teal-400 rounded-md focus:outline-none focus:border-teal-600">
                        <button class="absolute right-0 top-0 mt-1 mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-teal-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M15.293 13.707a1 1 0 0 1-1.414 1.414l-3.717-3.717a5.5 5.5 0 1 1 1.414-1.414l3.717 3.717zm-.707.707a7.5 7.5 0 1 0-10.606-10.606 7.5 7.5 0 0 0 10.606 10.606z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                    <!-- Auth buttons -->
                    <div>
                        <a href="#" class="py-2 px-4 bg-teal-700 text-white rounded-md hover:bg-teal-600">Đăng nhập</a>
                        <a href="#" class="py-2 px-4 bg-teal-800 text-white rounded-md hover:bg-teal-900">Đăng ký</a>
                    </div>
                </div>
            </div>
        </nav>
          <main class="py-4">

            @yield('content')
        </main>

        {{-- <script src="{{ asset('library/bootstrap-5.3.3-dist/js/bootstrap.min.js') }}"></script> --}}
        <script src="{{ asset('library/fontawesome-free-6.6.0-web/js/all.min.js') }}"></script>
        <script src="{{ asset('library/jquery-3.7.1.js') }}"></script>
        @yield('script')
    </div>
</body>
</html>
