<x-app-layout>
    <div>
        <!-- Carousel Background Images -->
        <div class="relative">
            <div class="multiple-items">
                @foreach ($backgrounds as $background)
                    <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                        <img src="{{ asset($background->URL) }}" alt="Background Image"
                            class="w-full h-full object-cover rounded-lg shadow-lg">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Phần Banner -->
        <section class="bg-gray-800 text-white py-20">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-semibold mb-6">Chào mừng đến với Công ty ABC</h1>
                <p class="text-lg leading-relaxed">Chúng tôi cung cấp các giải pháp công nghệ tiên tiến để tối ưu hóa hoạt động doanh nghiệp của bạn. Được thành lập từ năm 2000, chúng tôi tự hào với đội ngũ chuyên gia giàu kinh nghiệm và các sản phẩm chất lượng cao.</p>
            </div>
        </section>

        <!-- Phần Giới thiệu về Công ty -->
        <section class="py-20">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-semibold mb-6">Về chúng tôi</h2>
                <p class="text-lg leading-relaxed mb-8">Công ty ABC đã khẳng định vị thế của mình như một trong những nhà cung cấp hàng đầu trong lĩnh vực công nghệ thông tin. Với hơn 20 năm kinh nghiệm, chúng tôi cung cấp các giải pháp phần mềm và dịch vụ IT tối ưu nhất cho khách hàng của mình.</p>
                <p class="text-lg leading-relaxed">Cam kết của chúng tôi là mang lại sự đổi mới và sự hài lòng cao nhất cho khách hàng, từ những giải pháp phần mềm tùy chỉnh đến dịch vụ hỗ trợ kỹ thuật chất lượng cao.</p>
            </div>
        </section>

        <!-- Phần Lịch sử phát triển -->
        <section class="bg-gray-200 py-20">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-semibold mb-6">Lịch sử phát triển</h2>
                <p class="text-lg leading-relaxed mb-8">Công ty ABC được thành lập vào năm 2000 với mục tiêu cung cấp các giải pháp công nghệ tiên tiến. Từ một đội ngũ nhỏ, chúng tôi đã phát triển thành một công ty toàn cầu, phục vụ khách hàng tại hơn 30 quốc gia.</p>
                <p class="text-lg leading-relaxed">Chúng tôi đã liên tục mở rộng sản phẩm và dịch vụ của mình, từ các giải pháp phần mềm cho doanh nghiệp nhỏ đến các dự án công nghệ quy mô lớn cho các tập đoàn toàn cầu.</p>
            </div>
        </section>

        <!-- Phần Sản phẩm -->
        <section class="py-20">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-semibold mb-6">Sản phẩm của chúng tôi</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Thẻ sản phẩm mẫu -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-2">Phần mềm Quản lý Doanh nghiệp</h3>
                        <p class="text-lg mb-4">Giải pháp phần mềm toàn diện cho quản lý doanh nghiệp, bao gồm quản lý dự án, tài chính, và khách hàng.</p>
                        <a href="#" class="text-blue-500 hover:underline">Tìm hiểu thêm</a>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-2">Hệ thống CRM</h3>
                        <p class="text-lg mb-4">Hệ thống CRM giúp doanh nghiệp tối ưu hóa việc quản lý mối quan hệ với khách hàng và tăng cường hiệu quả bán hàng.</p>
                        <a href="#" class="text-blue-500 hover:underline">Tìm hiểu thêm</a>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-2">Dịch vụ Tư vấn IT</h3>
                        <p class="text-lg mb-4">Dịch vụ tư vấn công nghệ thông tin chuyên sâu, giúp doanh nghiệp triển khai và tối ưu hóa các giải pháp công nghệ.</p>
                        <a href="#" class="text-blue-500 hover:underline">Tìm hiểu thêm</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
<x-app-layout>
    <div>
        <!-- Carousel Background Images -->
        <div class="relative">
            <div class="multiple-items">
                @foreach ($backgrounds as $background)
                    <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                        <img src="{{ asset($background->URL) }}" alt="Background Image"
                            class="w-full h-full object-cover rounded-lg shadow-lg">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Phần Banner -->
        <section class="bg-gray-800 text-white py-20">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-semibold mb-6">Chào mừng đến với Công ty ABC</h1>
                <p class="text-lg leading-relaxed">Chúng tôi cung cấp các giải pháp công nghệ tiên tiến để tối ưu hóa hoạt động doanh nghiệp của bạn. Được thành lập từ năm 2000, chúng tôi tự hào với đội ngũ chuyên gia giàu kinh nghiệm và các sản phẩm chất lượng cao.</p>
            </div>
        </section>

        <!-- Phần Giới thiệu về Công ty -->
        <section class="py-20">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-semibold mb-6">Về chúng tôi</h2>
                <p class="text-lg leading-relaxed mb-8">Công ty ABC đã khẳng định vị thế của mình như một trong những nhà cung cấp hàng đầu trong lĩnh vực công nghệ thông tin. Với hơn 20 năm kinh nghiệm, chúng tôi cung cấp các giải pháp phần mềm và dịch vụ IT tối ưu nhất cho khách hàng của mình.</p>
                <p class="text-lg leading-relaxed">Cam kết của chúng tôi là mang lại sự đổi mới và sự hài lòng cao nhất cho khách hàng, từ những giải pháp phần mềm tùy chỉnh đến dịch vụ hỗ trợ kỹ thuật chất lượng cao.</p>
            </div>
        </section>

        <!-- Phần Lịch sử phát triển -->
        <section class="bg-gray-200 py-20">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-semibold mb-6">Lịch sử phát triển</h2>
                <p class="text-lg leading-relaxed mb-8">Công ty ABC được thành lập vào năm 2000 với mục tiêu cung cấp các giải pháp công nghệ tiên tiến. Từ một đội ngũ nhỏ, chúng tôi đã phát triển thành một công ty toàn cầu, phục vụ khách hàng tại hơn 30 quốc gia.</p>
                <p class="text-lg leading-relaxed">Chúng tôi đã liên tục mở rộng sản phẩm và dịch vụ của mình, từ các giải pháp phần mềm cho doanh nghiệp nhỏ đến các dự án công nghệ quy mô lớn cho các tập đoàn toàn cầu.</p>
            </div>
        </section>

        <!-- Phần Sản phẩm -->
        <section class="py-20">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-semibold mb-6">Sản phẩm của chúng tôi</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Thẻ sản phẩm mẫu -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-2">Phần mềm Quản lý Doanh nghiệp</h3>
                        <p class="text-lg mb-4">Giải pháp phần mềm toàn diện cho quản lý doanh nghiệp, bao gồm quản lý dự án, tài chính, và khách hàng.</p>
                        <a href="#" class="text-blue-500 hover:underline">Tìm hiểu thêm</a>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-2">Hệ thống CRM</h3>
                        <p class="text-lg mb-4">Hệ thống CRM giúp doanh nghiệp tối ưu hóa việc quản lý mối quan hệ với khách hàng và tăng cường hiệu quả bán hàng.</p>
                        <a href="#" class="text-blue-500 hover:underline">Tìm hiểu thêm</a>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-2">Dịch vụ Tư vấn IT</h3>
                        <p class="text-lg mb-4">Dịch vụ tư vấn công nghệ thông tin chuyên sâu, giúp doanh nghiệp triển khai và tối ưu hóa các giải pháp công nghệ.</p>
                        <a href="#" class="text-blue-500 hover:underline">Tìm hiểu thêm</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
