<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Column 1: Contact Info -->
                <div class="col-span-1">
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">Liên hệ</h3>
                    <p class="mb-4 text-gray-600">
                        <i class="fa-solid fa-map-marker-alt mr-2 text-blue-500"></i>
                        Số 1, Ngõ 45, Phố Đại Từ, P. Đại Kim, Q. Hoàng Mai, TP Hà Nội
                    </p>
                    <p class="mb-4 text-gray-600">
                        <i class="fa-solid fa-phone-alt mr-2 text-blue-500"></i>
                        <a href="tel:+123456789" class="text-blue-600 hover:underline">0948581080</a>
                    </p>
                    <p class="mb-4 text-gray-600">
                        <i class="fa-solid fa-envelope mr-2 text-blue-500"></i>
                        <a href="mailto:info@example.com" class="text-blue-600 hover:underline">tanhoangha2015@gmail.com</a>
                    </p>
                </div>
                <!-- Column 2: Quick Links -->
                <div class="col-span-1">
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">Liên kết nhanh</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('product.introduce') }}" class="text-blue-600 hover:underline">Giới thiệu</a></li>
                        <li><a href="{{ route('product.recruitment') }}" class="text-blue-600 hover:underline">Tuyển dụng</a></li>
                        <li><a href="{{ route('product.contact') }}" class="text-blue-600 hover:underline">Liên hệ</a></li>
                    </ul>
                </div>
                <!-- Column 3: Social Links -->
                <div class="col-span-1">
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">Mạng xã hội</h3>
                    <div class="flex space-x-6">
                        <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fa-brands fa-facebook fa-2x"></i></a>
                        <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fa-brands fa-twitter fa-2x"></i></a>
                        <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fa-brands fa-instagram fa-2x"></i></a>
                        <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fa-brands fa-linkedin fa-2x"></i></a>
                    </div>
                </div>
            </div>
            <!-- Copyright -->
            <div class="mt-8 border-t border-gray-300 pt-4 text-center text-sm text-gray-600">
                <p>&copy; 2024 Tên Công ty. Tất cả các quyền được bảo lưu.</p>
            </div>
        </div>
    </div>
</x-app-layout>
