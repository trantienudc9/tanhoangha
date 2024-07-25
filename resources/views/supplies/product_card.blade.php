<div
    class="group rounded-lg hover:shadow-xl from-purple-400 via-pink-500 to-red-500 transform hover:scale-105 transition duration-300 ease-in-out">
    <div class="h-96">
        <img src="{{ asset($valProduct->URL) }}"
            alt="{{ $valProduct->name }}" class="w-full h-2/3 object-contain">
        <div class="mt-6 px-8">
            <h2 class="text-lg font-semibold text-gray-800 search_item">
                {{ $valProduct->name }}</h2>
            <!-- Nếu cần thêm thông tin khác, bạn có thể thêm vào đây -->
        </div>
        <div class="flex justify-end mr-4 mt-4">
            <a
                href="{{ route('product.create', ['id' => $valProduct->id]) }}"><i
                    class="fa-solid fa-pen-to-square text-yellow-400 text-xl mr-2"></i></a>
            <button type="button" class="delete_product"
                d-id="{{ $valProduct->id }}">
                <i class="fa-solid fa-trash-can text-red-500 text-xl"></i>
            </button>
        </div>
    </div>
    <div class="flex justify-end mb-4 mr-4">
        <a href="{{ route('product.detail', ['id' => $valProduct->id]) }}"
            title="chi tiết">
            <i
                class="fa-solid fa-ellipsis text-xl transition transform hover:scale-110"></i>
        </a>
    </div>
</div>