<div class="group rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-300 ease-in-out">
    <div class="h-96">
        <img src="{{ asset($valProduct->URL) }}" alt="{{ $valProduct->name }}" class="w-full h-2/3 object-contain">
        <div class="mt-6 px-4 sm:px-8">
            <h2 class="text-lg font-semibold text-gray-800 truncate">{{ $valProduct->name }}</h2>
            <!-- Thêm thông tin khác nếu cần -->
        </div>
        <div class="flex justify-end items-center px-4 sm:px-8 py-4">
            @can('update')
                <a href="{{ route('product.create', ['id' => $valProduct->id]) }}" class="text-yellow-400 hover:text-yellow-500">
                    <i class="fa-solid fa-pen-to-square text-xl mr-2"></i>
                </a>
            @endcan
            @can('delete')
                <button type="button" class="delete_product ml-2" onclick="deleteForm('{{ route('product.delete') }}', {{ $valProduct->id }})">
                    <i class="fa-solid fa-trash-can text-red-500 text-xl"></i>
                </button>
            @endcan
        </div>
    </div>
    <div class="flex justify-end items-center px-4 sm:px-8 py-2">
        <a href="{{ route('product.detail', ['id' => $valProduct->id]) }}" title="chi tiết" class="text-xl text-gray-700 transition transform hover:scale-110">
            <i class="fa-solid fa-ellipsis"></i>
        </a>
    </div>
</div>
