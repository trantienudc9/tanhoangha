@extends('layout.default')
@section('title')
    Trang chủ
    @parent

@stop

@section('content')
    <div>
        <div class="relative">
            <div class="multiple-items">
                <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                    <img src="{{ asset('img/bacgroundn1.jpg') }}" alt=""
                        class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                    <img src="{{ asset('img/background2.jpg') }}" alt=""
                        class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                    <img src="{{ asset('img/background3.jpg') }}" alt=""
                        class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                    <img src="{{ asset('img/background4.jpg') }}" alt=""
                        class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
            </div>
        </div>

        <div>
            @php
                $products = config('supplies.me');
            @endphp

            <div class="bg-white p-4 rounded-lg shadow-lg">
                <h1 class="text-4xl font-bold text-cyan-500 mb-4 text-center">{{ $products[$kind_product_type] }}</h1>

                <div class="px-4 sm:px-8 md:px-12 lg:px-20">
                    <!-- Sản phẩm nổi bật -->
                    <h3 class="text-4xl font-medium text-cyan-400 mb-4">Sản phẩm nổi bật</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
                        @foreach ($typeProducts as $valProduct)
                            @if ($valProduct->status == 2)
                                @include('supplies.product_card')
                            @endif
                        @endforeach
                    </div>

                    <!-- Sản phẩm mới -->
                    <h3 class="text-4xl font-medium text-cyan-400 mb-4 mt-8">Sản phẩm mới</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
                        @foreach ($typeProducts as $valProduct)
                            @if ($valProduct->status == 3)
                                @include('supplies.product_card')
                            @endif
                        @endforeach
                    </div>

                    <!-- Tất cả -->
                    <h3 class="text-4xl font-medium text-cyan-400 mb-4 mt-8">Tất cả</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
                        @foreach ($typeProducts as $valProduct)
                            @include('supplies.product_card')
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

        $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 2000, // Đặt autoplaySpeed thích hợp cho tốc độ muốn
            arrows: false,
            draggable: true,
            fade: true, // Áp dụng hiệu ứng fade
            speed: 3000,
            cssEase: 'linear' // Hoặc sử dụng 'ease' cho hiệu ứng mượt mà hơn
        });
    </script>
@stop

@stop
