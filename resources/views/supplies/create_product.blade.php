{{-- @extends('layout.default')
@section('title')
    Thêm sản phẩm
    @parent

@stop --}}

{{-- @section('content') --}}
    {{-- @php $isEdit = isset($dataSupplies) ? true : false; @endphp --}}
    {{-- <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 space-y-6">
        <h1 class="text-2xl font-bold text-gray-900">{{ $isEdit ? 'Chỉnh sửa sản phẩm' : 'Thêm sản phẩm' }}</h1>
        <form action="{{ $isEdit ? route('product.update') : route('product.store') }}" method="POST"
            enctype="multipart/form-data" class="space-y-4">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif
            <input type="hidden" name="id_product" value="{{ isset($dataSupplies->id) ? $dataSupplies->id : '' }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Tên Vật Liệu -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Tên vật liệu:</label>
                    <input type="text" id="name" name="name"
                        class="shadow-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('name') border-red-500 @enderror"
                        placeholder="Nhập tên vật liệu" required value="{{ old('name', $dataSupplies->name ?? '') }}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Thương Hiệu -->
                <div class="mb-4">
                    <label for="type" class="block text-gray-700 text-sm font-medium mb-2">Thương hiệu:</label>
                    <input type="text" id="type" name="type"
                        class="shadow-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('type') border-red-500 @enderror"
                        placeholder="Nhập loại vật liệu" required value="{{ old('type', $dataSupplies->type ?? '') }}">
                    @error('type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Loại Sản Phẩm -->
                <div class="mb-4">
                    <label for="product_type" class="block text-gray-700 text-sm font-medium mb-2">Loại sản phẩm:</label>
                    <select id="product_type" name="product_type"
                        class="shadow-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('product_type') border-red-500 @enderror"
                        required>
                        @foreach (config('supplies.product_type') as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('product_type', $dataSupplies->product_type ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sản Phẩm -->
                <div class="mb-4 add_kind">
                    @php
                        // Xác định kiểu sản phẩm và lấy cấu hình tương ứng
                        $productType = $dataSupplies->product_type ?? null;
                        $configKey = match ($productType) {
                            1 => 'stone',
                            2 => 'me',
                            3 => 'metal',
                            default => null,
                        };
                        $configData = $configKey ? config("supplies.$configKey") : config("supplies.stone");
                    @endphp

                    <label for="kind_product_type" class="block text-gray-700 text-sm font-medium mb-2">Sản phẩm:</label>
                    <select id="kind_product_type" name="kind_product_type"
                        class="shadow-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500
                        @error('kind_product_type') border-red-500 @enderror">
                        @foreach ($configData as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('kind_product_type', $dataSupplies->kind_product_type ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('kind_product_type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Trạng Thái -->
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-medium mb-2">Trạng thái:</label>
                    <select id="status" name="status"
                        class="shadow-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('status') border-red-500 @enderror"
                        required>
                        @foreach (config('supplies.status') as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('status', $dataSupplies->status ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ảnh -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-medium mb-2">Ảnh:</label>
                    <div class="flex items-center">
                        <label
                            class="w-full flex justify-center items-center px-4 py-2 bg-white text-blue-500 rounded-lg shadow-md border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a2.5 2.5 0 012.5 2.5V15a2.5 2.5 0 01-2.5 2.5h-9A2.5 2.5 0 013 15V5.5A2.5 2.5 0 015.5 3h9zm-9 1.5A1.5 1.5 0 017 6v8a1.5 1.5 0 01-1.5 1.5h-5A1.5 1.5 0 010 14V6a1.5 1.5 0 011.5-1.5h5zM12 7a1 1 0 00-1-1H9a1 1 0 100 2h2a1 1 0 001-1zm1 3a1 1 0 00-2 0v4a1 1 0 102 0v-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span id="file-name" class="text-base text-gray-700">Chọn tệp</span>
                            <input type='file' id="image" name="image" class="hidden" />
                        </label>
                    </div>
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hiển Thị Ảnh -->
                <div id="image-preview" class="mb-4">
                    <!-- Hiển thị hình ảnh trước khi tải lên -->
                    @if (isset($dataSupplies->URL))
                        <img src="{{ asset($dataSupplies->URL) }}" class="rounded-lg shadow-md w-full max-w-xs mx-auto">
                    @endif
                </div>
            </div>

            <!-- Nút Gửi -->
            <div class="flex flex-col md:flex-row items-center md:justify-between space-y-4 md:space-y-0">
                <button type="submit"
                    class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $isEdit ? 'Cập nhật' : 'Tạo sản phẩm' }}</button>
                @if($isEdit)
                    <a href="{{ route('product.index') }}"
                    class="text-blue-500 hover:underline">Quay lại</a>
                @else
                <button type="reset" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Làm mới
                </button>
                @endif

            </div>
        </form>
    </div> --}}




{{-- @section('script') --}}
    {{-- <script src="../js/create_products.js"></script> --}}
    <!-- Thêm các tài nguyên JavaScript của bạn tại đây -->
    <script type="text/javascript">
        $('#image').change(function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').empty(); // Clear previous preview
                var imgElement = $('<img>').attr({
                    src: e.target.result,
                    class: 'rounded-lg shadow-md',
                    style: 'max-width: 100%;'
                });
                $('#image-preview').append(imgElement);
            };
            reader.readAsDataURL(file);
            $('#file-name').text(file.name);
        });

        $(document).ready(function() {
            // Lưu cấu hình vào biến toàn cục để truy xuất nhanh hơn
            const dataConfig = {
                1: @json(config('supplies.stone')),
                2: @json(config('supplies.me')),
                3: @json(config('supplies.metal'))
            };

            $("#product_type").on("change", function() {
                const productType = $(this).val();
                const data_type = dataConfig[productType] || {};

                // Tạo các tùy chọn
                const options = Object.entries(data_type).map(([key, value]) =>
                    `<option value="${key}">${value}</option>`
                ).join('');

                // Cập nhật HTML
                const add_data = options ? `
            <label for="kind_product_type" class="block text-gray-700 text-sm font-bold mb-2">Sản phẩm:</label>
            <select id="kind_product_type" name="kind_product_type"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                ${options}
            </select>` : '';

                $(".add_kind").html(add_data);
            });
        });

    </script>
{{-- @stop

@stop --}}

<x-app-layout>

    @php $isEdit = isset($dataSupplies) ? true : false; @endphp
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 space-y-6">
        <h1 class="text-2xl font-bold text-gray-900">{{ $isEdit ? 'Chỉnh sửa sản phẩm' : 'Thêm sản phẩm' }}</h1>
        <form action="{{ $isEdit ? route('product.update') : route('product.store') }}" method="POST"
            enctype="multipart/form-data" class="space-y-4">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif
            <input type="hidden" name="id_product" value="{{ isset($dataSupplies->id) ? $dataSupplies->id : '' }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Tên Vật Liệu -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Tên vật liệu:</label>
                    <input type="text" id="name" name="name"
                        class="shadow-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('name') border-red-500 @enderror"
                        placeholder="Nhập tên vật liệu" required value="{{ old('name', $dataSupplies->name ?? '') }}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Thương Hiệu -->
                <div class="mb-4">
                    <label for="type" class="block text-gray-700 text-sm font-medium mb-2">Thương hiệu:</label>
                    <input type="text" id="type" name="type"
                        class="shadow-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('type') border-red-500 @enderror"
                        placeholder="Nhập loại vật liệu" required value="{{ old('type', $dataSupplies->type ?? '') }}">
                    @error('type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Loại Sản Phẩm -->
                <div class="mb-4">
                    <label for="product_type" class="block text-gray-700 text-sm font-medium mb-2">Loại sản phẩm:</label>
                    <select id="product_type" name="product_type"
                        class="shadow-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('product_type') border-red-500 @enderror"
                        required>
                        @foreach (config('supplies.product_type') as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('product_type', $dataSupplies->product_type ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sản Phẩm -->
                <div class="mb-4 add_kind">
                    @php
                        // Xác định kiểu sản phẩm và lấy cấu hình tương ứng
                        $productType = $dataSupplies->product_type ?? null;
                        $configKey = match ($productType) {
                            1 => 'stone',
                            2 => 'me',
                            3 => 'metal',
                            default => null,
                        };
                        $configData = $configKey ? config("supplies.$configKey") : config("supplies.stone");
                    @endphp

                    <label for="kind_product_type" class="block text-gray-700 text-sm font-medium mb-2">Sản phẩm:</label>
                    <select id="kind_product_type" name="kind_product_type"
                        class="shadow-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500
                        @error('kind_product_type') border-red-500 @enderror">
                        @foreach ($configData as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('kind_product_type', $dataSupplies->kind_product_type ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('kind_product_type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Trạng Thái -->
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-medium mb-2">Trạng thái:</label>
                    <select id="status" name="status"
                        class="shadow-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('status') border-red-500 @enderror"
                        required>
                        @foreach (config('supplies.status') as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('status', $dataSupplies->status ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ảnh -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-medium mb-2">Ảnh:</label>
                    <div class="flex items-center">
                        <label
                            class="w-full flex justify-center items-center px-4 py-2 bg-white text-blue-500 rounded-lg shadow-md border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a2.5 2.5 0 012.5 2.5V15a2.5 2.5 0 01-2.5 2.5h-9A2.5 2.5 0 013 15V5.5A2.5 2.5 0 015.5 3h9zm-9 1.5A1.5 1.5 0 017 6v8a1.5 1.5 0 01-1.5 1.5h-5A1.5 1.5 0 010 14V6a1.5 1.5 0 011.5-1.5h5zM12 7a1 1 0 00-1-1H9a1 1 0 100 2h2a1 1 0 001-1zm1 3a1 1 0 00-2 0v4a1 1 0 102 0v-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span id="file-name" class="text-base text-gray-700">Chọn tệp</span>
                            <input type='file' id="image" name="image" class="hidden" />
                        </label>
                    </div>
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hiển Thị Ảnh -->
                <div id="image-preview" class="mb-4">
                    <!-- Hiển thị hình ảnh trước khi tải lên -->
                    @if (isset($dataSupplies->URL))
                        <img src="{{ asset($dataSupplies->URL) }}" class="rounded-lg shadow-md w-full max-w-xs mx-auto">
                    @endif
                </div>
            </div>

            <!-- Nút Gửi -->
            <div class="flex flex-col md:flex-row items-center md:justify-between space-y-4 md:space-y-0">
                <button type="submit"
                    class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $isEdit ? 'Cập nhật' : 'Tạo sản phẩm' }}</button>
                @if($isEdit)
                    <a href="{{ route('product.index') }}"
                    class="text-blue-500 hover:underline">Quay lại</a>
                @else
                <button type="reset" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Làm mới
                </button>
                @endif

            </div>
        </form>
    </div>
</x-app-layout>
