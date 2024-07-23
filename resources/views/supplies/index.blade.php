@extends('layout.default')
@section('title')
    Trang chủ
    @parent

@stop

@section('content')
    <div>
        <div>
            <img src="http://phutai.com.vn/images/2018/07/bg-da.jpg" alt="" class="w-full h-25 object-fit:cover">
        </div>
        <div>
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <h1 class="text-4xl font-bold text-cyan-500 mb-4 text-center">Sản phẩm đá   </h1>
                <div class="px-28">
                    <h3 class="text-4xl font-medium text-cyan-400 mb-4">Sản phẩm nổi bật</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
                        @foreach ($supplies as $itemSupplies)
                            <div
                                class="group rounded-lg hover:shadow-xl  from-purple-400 via-pink-500 to-red-500 transform hover:scale-105 transition duration-300 ease-in-out">
                                <a href="{{ route('product.detail',['id' => $itemSupplies->id]) }}">
                                    <div class=" h-96">
                                        <img src="{{ asset($itemSupplies->URL) }}" alt="{{ $itemSupplies->name }}"
                                            class="w-full h-2/3 object-cover">
                                        <div class="mt-6 px-8">
                                            <h2 class="text-lg font-semibold text-gray-800">{{ $itemSupplies->name }}</h2>
                                            <!-- Nếu cần thêm thông tin khác, bạn có thể thêm vào đây -->
                                        </div>
                                        <div class="flex justify-end mr-4 mt-4">
                                            <a href="{{ route('product.create', ['id' => $itemSupplies->id]) }}"><i
                                                    class="fa-solid fa-pen-to-square text-yellow-400 text-xl mr-2"></i></a>
                                            <button type="button" class="delete_product" d-id = '{{ $itemSupplies->id }}'>
                                                <i class="fa-solid fa-trash-can text-red-500 text-xl"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex justify-end mb-4 mr-4">
                                        <i class="fa-solid fa-ellipsis text-xl transition transform hover:scale-110"></i>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="delete-product-form">
        @csrf
        @method('DELETE')
    </form>

@section('script')


    <!-- Thêm các tài nguyên JavaScript của bạn tại đây -->
    <script type="text/javascript">
        $(".delete_product").on("click", function(event) {
            event.preventDefault(); // Prevent default behavior of the click event
            let del = confirm("Are you sure you want to delete this holiday?");
            if (del) {
                let id = $(this).attr("d-id");
                $("#delete-product-form").attr("action", "{{ route('product.delete') }}");
                $("#delete-product-form").attr("method", "POST");
                $("#delete-product-form").append('<input type="hidden" name="id" value=' + id + '>');
                $("#delete-product-form").submit(); // Submit the form
            }
        });
    </script>
@stop

@stop
