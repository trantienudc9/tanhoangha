@extends('layout.default')

@section('title')
    Ảnh nền
    @parent
@stop

@section('content')

    <div class="max-w-7xl mx-auto px-6 py-8 bg-white from-blue-100 via-purple-100 to-pink-100 rounded-xl shadow-lg">
        <!-- Hiển thị thông báo lỗi nếu có -->
        @if ($errors->any())
            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <strong class="font-bold">Có lỗi xảy ra!</strong>
                <ul class="list-disc pl-5 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Hiển thị thông báo thành công nếu có -->
        @if (session('success'))
            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                <strong class="font-bold">Thành công!</strong>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @php
            $supplies = config('supplies.list_background');
            $edit = isset($itemBackground) ? route('image.update_background') : route('image.store_background');
        @endphp
        <!-- Form gửi dữ liệu -->
        <form action="{{ $edit }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            {{ isset($itemBackground) ? method_field('PUT') : '' }}
            <input type="text" hidden name="id_background" value="{{ isset($itemBackground->id) ? $itemBackground->id : '' }}">
            <label for="select" class="block text-gray-800 text-xl font-semibold mb-4">Ảnh vật tư</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Select -->
                <div class="flex items-center gap-4">
                    <label for="select" class="text-gray-800 font-medium">Vật tư</label>
                    <select id="select"
                        class="block w-full md:w-2/3 p-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-400 focus:border-transparent text-gray-700"
                        name="id_kind_background">
                        @foreach ($supplies as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('id_kind_background', $itemBackground->id_kind_background ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- File input -->
                <div class="flex items-center gap-4">
                    <label for="fileInput" class="text-gray-800 font-medium">Chọn ảnh</label>
                    <!-- Tạo một phần tử div cho nút chọn ảnh -->
                    <div id="chooseImage"
                        class="relative py-3 px-6 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 cursor-pointer flex items-center space-x-2">
                        <i class="fa-solid fa-cloud-arrow-up text-lg"></i>
                        <span>Chọn ảnh</span>
                    </div>
                    <!-- Input file được ẩn đi -->
                    <input type="file" id="fileInput" class="hidden" accept="image/*" name="image">
                </div>

                <!-- Submit button -->
                <div class="flex items-center justify-start">
                    <button type="submit"
                        class="w-full md:w-1/3 py-3 px-6 bg-green-500 from-teal-400 to-teal-600 text-white font-bold rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-teal-400">{{ isset($itemBackground) ? 'Cập nhật' : 'Tạo' }}</button>
                </div>
            </div>
        </form>

        <div id="filePreview"
            class="mt-6 flex gradient-border justify-center h-64 md:w-96 m-auto w-64 p-6 bg-white border-2 rounded-lg shadow-lg">
            <!-- Content will be injected here -->
            <div class="relative z-10 text-center flex justify-center flex-col">
                @if (isset($itemBackground->id_kind_background))
                    <!-- Hiển thị hình ảnh nếu có id_kind_background -->
                    <img src="{{ asset($itemBackground->URL) }}" class="file-preview rounded-lg shadow-lg w-52 h-auto" alt="Preview">
                    {{-- <img src="{{ asset($itemBackground->URL) }}" alt="" class="file-preview rounded-lg shadow-lg w-2/3 h-auto"> --}}
                @else
                    <!-- Hiển thị nội dung khác nếu không có id_kind_background -->
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">File Preview</h2>
                    <p class="text-gray-600">
                        <i class="fa-solid fa-cloud-arrow-up text-2xl text-blue-500"></i>
                    </p>
                @endif

            </div>
        </div>
    </div>

    <div class="max-w-7xl mt-4 mx-auto px-6 py-8 bg-white from-blue-100 via-purple-100 to-pink-100 rounded-xl shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-teal-500 text-white">
                        <th class="py-3 px-4 !text-center">Stt</th>
                        <th class="py-3 px-4 !text-center">Tên</th>
                        <th class="py-3 px-4 !text-center">Ảnh</th>
                        <th class="py-3 px-4 !text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($backgrounds as $key => $background)
                        <tr class="even:bg-gray-200 odd:bg-gray-50 hover:bg-teal-200 border-t border-gray-200">
                            <td class="py-3 px-4 text-center">{{ $key + 1 }}</td>
                            <td class="py-3 px-4 text-center">{{ $supplies[$background->id_kind_background] }}</td>
                            <td class="py-3 px-4 text-center">
                                <a href="#" class="flex justify-center">
                                    <img src="{{ asset($background->URL) }}"
                                        class="w-24 h-auto rounded-lg border border-gray-300" alt="lỗi">
                                </a>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('image.background', ['id' => $background->id]) }}">
                                    <i class="fa-solid fa-pen-to-square text-yellow-400 text-xl mr-2"></i>
                                </a>
                                <button type="button" class="delete_background" onclick="deleteForm('{{ route('image.delete_background') }}',{{ $background->id }})">
                                    <i class="fa-solid fa-trash-can text-red-500 text-xl"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@section('script')

    <script type="text/javascript">
        $(document).ready(function() {
            // Lắng nghe sự kiện click trên nút chọn ảnh
            $('#chooseImage').on('click', function() {
                // Kích hoạt input file khi nút chọn ảnh được nhấp
                $('#fileInput').click();
            });
        });

            // Lắng nghe sự kiện thay đổi trên input file
            $('#fileInput').on('change', function(event) {
                // Lấy tệp được chọn từ input
                const file = event.target.files[0];
                const $filePreview = $('#filePreview');

                // Kiểm tra nếu có tệp được chọn
                if (file) {
                    const reader = new FileReader();

                    // Đọc nội dung của tệp sau khi nó được chọn
                    reader.onload = function(e) {
                        let content;
                        // Kiểm tra xem tệp có phải là hình ảnh không
                        if (file.type.startsWith('image/')) {
                            content =
                                `<img src="${e.target.result}" class="file-preview rounded-lg shadow-lg max-w-full h-auto" alt="Preview">`;
                        } else {
                            content = `
                <div class="bg-white p-4 rounded-lg shadow-md">
                  <p class="text-gray-800 font-semibold">File: ${file.name}</p>
                  <p class="text-gray-600">Type: ${file.type}</p>
                  <p class="text-gray-600">Size: ${file.size} bytes</p>
                </div>`;
                        }
                        // Hiển thị nội dung của tệp lên giao diện
                        $filePreview.html(content);
                    };

                    // Đọc tệp dưới dạng Data URL (dùng cho hình ảnh và tệp khác)
                    reader.readAsDataURL(file);
                } else {
                    // Xóa bản xem trước nếu không có tệp được chọn
                    $filePreview.empty();
                }
            });
        });

        $(document).ready(function() {
            // Khởi tạo DataTable cho bảng của bạn
            $('table').DataTable({
                "paging": true, // Cho phép phân trang
                "searching": true, // Cho phép tìm kiếm
                "info": true, // Hiển thị thông tin bảng (hiển thị số lượng bản ghi)
                "responsive": true // Tự động điều chỉnh kích thước bảng cho các thiết bị di động
            });

            // Lắng nghe sự kiện click trên nút chọn ảnh
            $('#chooseImage').on('click', function() {
                $('#fileInput').click();
            });

            $('#fileInput').on('change', function(event) {
                const file = event.target.files[0];
                const $filePreview = $('#filePreview');

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        let content;
                        if (file.type.startsWith('image/')) {
                            content =
                                `<img src="${e.target.result}" class="file-preview rounded-lg shadow-lg max-w-full h-auto" alt="Preview">`;
                        } else {
                            content = `
                <div class="bg-white p-4 rounded-lg shadow-md">
                  <p class="text-gray-800 font-semibold">File: ${file.name}</p>
                  <p class="text-gray-600">Type: ${file.type}</p>
                  <p class="text-gray-600">Size: ${file.size} bytes</p>
                </div>`;
                        }
                        $filePreview.html(content);
                    };

                    reader.readAsDataURL(file);
                } else {
                    $filePreview.empty();
                }
            });
        });

    </script>

@stop

@stop
