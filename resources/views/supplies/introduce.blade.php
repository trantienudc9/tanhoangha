@extends('layout.default')

@section('title')
    Giới thiệu
    @parent
@stop

@section('content')
    <div>
        <!-- Carousel Background Images -->
        <div class="relative">
            <div class="multiple-items">
                @foreach ($backgrounds as $background)
                    <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                        <img src="{{ asset($background->URL) }}" alt="" class="w-full h-full object-cover rounded-lg shadow-lg">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Phần Banner -->
        <section class="bg-gray-800 text-white py-20">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-semibold mb-6">Chào mừng đến với Tên Công ty</h1>
                <p class="text-lg leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </section>

        <!-- Phần Giới thiệu về Công ty -->
        <section class="py-20">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-semibold mb-6">Về chúng tôi</h2>
                <p class="text-lg leading-relaxed mb-8">Tên Công ty đã từng bước khẳng định vị thế là đơn vị dẫn đầu trong
                    việc cung cấp các sản phẩm chất lượng cao trong lĩnh vực công nghiệp từ năm 1990. Lorem ipsum dolor sit
                    amet, consectetur adipiscing elit. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu fugiat nulla pariatur.</p>
                <p class="text-lg leading-relaxed">Cam kết với sự đổi mới và sự hài lòng của khách hàng đã đưa chúng tôi vươn
                    lên vị thế dẫn đầu trong ngành công nghiệp. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </section>

        <!-- Phần Lịch sử phát triển -->
        <section class="bg-gray-200 py-20">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-semibold mb-6">Lịch sử phát triển</h2>
                <p class="text-lg leading-relaxed mb-8">Thành lập vào năm 1990, Tên Công ty bắt đầu từ một doanh nghiệp nhỏ
                    trong gia đình. Suốt những năm qua, chúng tôi đã phát triển thành một tên tuổi được tin tưởng trong ngành,
                    nổi bật với sự đáng tin cậy và cam kết với chất lượng.</p>
                <p class="text-lg leading-relaxed">Trong suốt hành trình phát triển, chúng tôi đã mở rộng hoạt động toàn cầu,
                    phục vụ khách hàng tại hơn 20 quốc gia. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </section>

        <!-- Phần Sản phẩm -->
        <section class="py-20">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-semibold mb-6">Sản phẩm của chúng tôi</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Thẻ sản phẩm mẫu -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-2">Tên Sản phẩm 1</h3>
                        <p class="text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="text-blue-500 hover:underline">Tìm hiểu thêm</a>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-2">Tên Sản phẩm 2</h3>
                        <p class="text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="text-blue-500 hover:underline">Tìm hiểu thêm</a>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-2">Tên Sản phẩm 3</h3>
                        <p class="text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="text-blue-500 hover:underline">Tìm hiểu thêm</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

@section('script')
    <!-- Thêm các tài nguyên JavaScript của bạn tại đây -->
    <script type="text/javascript"></script>
@stop

@stop
