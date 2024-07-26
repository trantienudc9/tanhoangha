@extends('layout.default')
@section('title')
    Thiết lập thông số
    @parent

@stop

@section('content')

    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-2xl font-bold mb-6">Thiết lập thông số</h2>
        <form action="{{ route('conditioning.store_conditioning') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <input type="text" hidden name="supplies_id" value="{{ $id }}">
            @csrf
            <!-- Capacity Field -->
            <div class="mb-4">
                <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Công suất</label>
                <input type="text" id="capacity" name="capacity" placeholder="Nhập công suất sản phẩm"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ isset($parameter->capacity) ? $parameter->capacity : ''}}">
            </div>
            <!-- Origin Field -->
            <div class="mb-4">
                <label for="origin" class="block text-gray-700 text-sm font-bold mb-2">Xuất xứ</label>
                <input type="text" id="origin" name="origin" placeholder="Nhập xuất xứ sản phẩm"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ isset($parameter->origin) ? $parameter->origin : ''}}" >
            </div>
            <!-- Type Field -->
            <div class="mb-4">
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Loại máy</label>
                <input type="text" id="type" name="type" placeholder="Nhập loại máy sản phẩm"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ isset($parameter->type) ? $parameter->type : ''}}">
            </div>
            <!-- Gas Type Field -->
            <div class="mb-4">
                <label for="gas_type" class="block text-gray-700 text-sm font-bold mb-2">Loại gas</label>
                <input type="text" id="gas_type" name="gas_type" placeholder="Nhập loại gas sản phẩm"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ isset($parameter->gas_type) ? $parameter->gas_type : ''}}">
            </div>
            <!-- Technology Field -->
            <div class="mb-4">
                <label for="technology" class="block text-gray-700 text-sm font-bold mb-2">Công nghệ</label>
                <input type="text" id="technology" name="technology" placeholder="Nhập công nghệ sản phẩm"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ isset($parameter->technology) ? $parameter->technology : ''}}">
            </div>
            <!-- Warranty Field -->
            <div class="mb-6">
                <label for="warranty" class="block text-gray-700 text-sm font-bold mb-2">Bảo hành</label>
                <input type="text" id="warranty" name="warranty" placeholder="Nhập thời gian bảo hành sản phẩm"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ isset($parameter->warranty) ? $parameter->warranty : ''}}">
            </div>
            <!-- Submit Button -->
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Lưu thông tin
                </button>
            </div>
        </form>
    </div>

@section('script')

    <!-- Thêm các tài nguyên JavaScript của bạn tại đây -->
    <script type="text/javascript"></script>
@stop

@stop
