<x-app-layout>
    <div class="relative">
        <!-- Carousel Background Images -->
        <div class="multiple-items">
            @foreach ($backgrounds as $background)
                <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                    <img src="{{ asset($background->URL) }}" alt=""
                        class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
            @endforeach
        </div>
    </div>

    <div class="container mx-auto py-12">
        <div class="mx-auto bg-white shadow-md rounded px-8 py-8">
            <h2 class="text-3xl font-bold mb-6 text-center">Liên hệ</h2>
            <p class="text-gray-700 mb-8 text-center">Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Thông tin liên hệ</h3>
                    <p class="text-gray-700 mb-2"><span class="font-semibold">Địa chỉ:</span> Số 123 Đường ABC, Phường XYZ, Quận DEF, Thành phố Hồ Chí Minh</p>
                    <p class="text-gray-700 mb-2"><span class="font-semibold">Điện thoại:</span> (+84) 123 456 789</p>
                    <p class="text-gray-700 mb-6"><span class="font-semibold">Email:</span> <a href="mailto:info@companyabc.com" class="text-blue-500 hover:underline">info@companyabc.com</a></p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Chi nhánh Hà Nội</h3>
                    <p class="text-gray-700 mb-2"><span class="font-semibold">Địa chỉ:</span> Số 456 Đường XYZ, Phường ABC, Quận MNO, Thành phố Hà Nội</p>
                    <p class="text-gray-700 mb-2"><span class="font-semibold">Điện thoại:</span> (+84) 987 654 321</p>
                    <p class="text-gray-700 mb-6"><span class="font-semibold">Email:</span> <a href="mailto:hanoi@companyabc.com" class="text-blue-500 hover:underline">hanoi@companyabc.com</a></p>
                </div>
            </div>

            <div class="mt-8 text-center">
                <h3 class="text-xl font-bold mb-4">Tổng đài chăm sóc khách hàng</h3>
                <p class="text-gray-700 mb-2"><span class="font-semibold">Hotline:</span> (+84) 111 222 333</p>
                <p class="text-gray-700 mb-6"><span class="font-semibold">Email hỗ trợ:</span> <a href="mailto:support@companyabc.com" class="text-blue-500 hover:underline">support@companyabc.com</a></p>

                <p class="text-gray-700 mb-4">Theo dõi chúng tôi trên các mạng xã hội để cập nhật thông tin mới nhất và các chương trình khuyến mãi đặc biệt.</p>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="text-blue-500 hover:text-blue-700">Facebook</a>
                    <a href="#" class="text-blue-500 hover:text-blue-700">Twitter</a>
                    <a href="#" class="text-blue-500 hover:text-blue-700">LinkedIn</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
