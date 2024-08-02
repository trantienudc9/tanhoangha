<x-app-layout>

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
            $edit = isset($getFindProduct) ? route('product-types.update') : route('product-types.store');
            $background = isset($getFindProduct) ? $getFindProduct->id : '';
        @endphp
        <!-- Form gửi dữ liệu -->
        <form action="{{ $edit }}" method="POST" class="space-y-6">
            @csrf
            {{ isset($getFindProduct) ? method_field('PUT') : '' }}
            <input type="text" hidden name="id_pd" value="{{ isset($getFindProduct->id) ? $getFindProduct->id : '' }}">
            <label for="select" class="block text-gray-800 text-xl font-semibold mb-4">Loại sản phẩm</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                <!-- Select -->
                <div class="flex items-center gap-4">
                    <label for="name" class="text-gray-800 font-medium">Loại </label>
                    <input type="text" id="name" name="name" value="{{ isset($getFindProduct->name) ? $getFindProduct->name : '' }}" class="block w-full md:w-2/3 p-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-400 focus:border-transparent text-gray-700" placeholder="Nhập loại sản phẩm"/>
                </div>

                <!-- Submit button -->
                <div class="flex items-center justify-start gap-4">
                    <button type="submit"
                        class="w-full md:w-1/3 py-3 px-6 bg-green-500 from-teal-400 to-teal-600 text-white font-bold rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-teal-400">{{ isset($getFindProduct) ? 'Cập nhật' : 'Tạo' }}</button>
                    @if(isset($getFindProduct))
                        <a href="{{ route('product-types.index') }}" 
                            class="inline-block px-6 py-3 bg-teal-500 text-white font-semibold rounded-lg shadow-md transition duration-300 ease-in-out hover:bg-teal-600 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-teal-400">
                            Hủy
                        </a>
                 
                    @endif
                    <a href="{{ route('product.create') }}" title="Thêm sản phẩm" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                        Quay lại
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div class="max-w-7xl mt-4 mx-auto px-6 py-8 bg-white from-blue-100 via-purple-100 to-pink-100 rounded-xl shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-teal-500 text-white">
                        <th class="py-3 px-4 !text-center">Stt</th>
                        <th class="py-3 px-4 !text-center">Loại sản phẩm</th>
                        <th class="py-3 px-4 !text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productTypes as $key => $productType)
                        <tr class="{{ $background == $productType->id ? '!bg-teal-300' : '' }} even:bg-gray-200 odd:bg-gray-50 hover:bg-teal-200 border-t border-gray-200">
                            <td class="py-3 px-4 !text-center">{{ $key + 1 }}</td>
                            <td class="py-3 px-4 text-center">{{ $productType->name }}</td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('product-types.index', ['id' => $productType->id]) }}">
                                    <i class="fa-solid fa-pen-to-square text-yellow-400 text-xl mr-2"></i>
                                </a>
                                <button type="button" class="delete_productType" onclick="deleteForm('{{ route('product-types.destroy') }}',{{ $productType->id }})">
                                    <i class="fa-solid fa-trash-can text-red-500 text-xl"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
@vite(['resources/js/pages/product_types.js'])