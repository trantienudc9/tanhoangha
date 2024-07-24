<div
    class="group rounded-lg overflow-hidden hover:shadow-xl transition duration-300 ease-in-out transform hover:scale-105">
    <img src="{{ asset($valProduct->URL) }}" alt="{{ $valProduct->name }}" class="w-full h-2/3 object-cover">
    <div class="p-4">
        <h2 class="text-lg font-semibold text-gray-800">{{ $valProduct->name }}</h2>
        <!-- Additional information can be added here -->
    </div>
    <div class="flex justify-end items-center px-4 py-2">
        <a href="{{ route('product.create', ['id' => $valProduct->id]) }}" class="text-yellow-400 text-xl mr-2"><i
                class="fas fa-pen-to-square"></i></a>
        <button type="button" class="delete_product" d-id="{{ $valProduct->id }}">
            <i class="fas fa-trash-can text-red-500 text-xl"></i>
        </button>
    </div>
    <div class="flex justify-end items-center px-4 py-2">
        <a href="{{ route('product.detail', ['id' => $valProduct->id]) }}" title="chi tiết">
            <i class="fas fa-ellipsis text-xl transition transform hover:scale-110"></i>
        </a>
    </div>
</div>
