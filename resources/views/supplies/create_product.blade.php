@extends('layout.default')
@section('title')
    Trang chủ
    @parent

@stop

@section('content')
    @php $isEdit = isset($dataSupplies) ? true : false; @endphp
    <div class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ $isEdit ? route('product.update') : route('product.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif
            <input type="hidden" name="id_product" value="{{ isset($dataSupplies->id) ? $dataSupplies->id : '' }}">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Tên vật liệu:</label>
                <input type="text" id="name" name="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Nhập tên vật liệu" required value="{{ old('name', $dataSupplies->name ?? '') }}">
            </div>
            <div class="mb-4">
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Thương hiệu:</label>
                <input type="text" id="type" name="type"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Nhập loại vật liệu" required value="{{ old('type', $dataSupplies->type ?? '') }}">
            </div>
            <div class="mb-4">
                <label for="product_type" class="block text-gray-700 text-sm font-bold mb-2">Loại sản phẩm:</label>
                <select id="product_type" name="product_type"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    @foreach (config('supplies.product_type') as $id => $name)
                        <option value="{{ $id }}"
                            {{ old('product_type', $dataSupplies->product_type ?? '') == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4 add_kind">
                @if (isset($dataSupplies->kind_product_type))
                    @php
                        $productType = $dataSupplies->product_type;
                        $configData = $productType == 2 ? config('supplies.me') : config('supplies.metal');
                    @endphp

                    <label for="kind_product_type" class="block text-gray-700 text-sm font-bold mb-2">Sản phẩm:</label>
                    <select id="kind_product_type" name="kind_product_type"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach ($configData as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('kind_product_type', $dataSupplies->kind_product_type ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                @endif
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Trạng thái:</label>
                <select id="status" name="status"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    @foreach (config('supplies.status') as $id => $name)
                        <option value="{{ $id }}"
                            {{ old('status', $dataSupplies->status ?? '') == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Ảnh:</label>
                <div class="flex items-center">
                    <label
                        class="w-full flex justify-center items-center px-4 py-2 bg-white text-blue-500 rounded-lg shadow-md tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white">
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
            </div>
            <div id="image-preview" class="mb-4">
                <!-- Hiển thị hình ảnh trước khi tải lên -->
                @if (isset($dataSupplies->URL))
                    <img src="{{ asset($dataSupplies->URL) }}" class="rounded-lg shadow-md" style="max-width: 100%;">
                @endif
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ $isEdit ? 'Cập nhật' : 'Tạo sản phẩm' }}</button>
            </div>
        </form>
    </div>

@section('script')
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

        $("#product_type").on("change", function() {
            let productType = $(this).val();
            let data = '';
            let add_data = '';

            if (productType == 2 || productType == 3) {
                let data_type = (productType == 2) ? @json(config('supplies.me')) : @json(config('supplies.metal'));

                data = Object.entries(data_type).map(([key, value]) =>
                    `<option value="${key}">
                            ${value}
                        </option>`
                ).join('');

                add_data = `
                        <label for="kind_product_type" class="block text-gray-700 text-sm font-bold mb-2">Sản phẩm:</label>
                        <select id="kind_product_type" name="kind_product_type"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            ${data}
                        </select>`;
            }

            $(".add_kind").html(add_data);
        });
    </script>
@stop

@stop
