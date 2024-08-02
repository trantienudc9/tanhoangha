<x-app-layout>
   
    <div class="max-w-7xl mt-4 mx-auto px-6 py-8 bg-white from-blue-100 via-purple-100 to-pink-100 rounded-xl shadow-lg">
        <a href="{{ route('register') }}" title="Tạo tài khoản" class="inline-block bg-green-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            <i class="fa-solid fa-plus"></i>
        </a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-teal-500 text-white">
                        <th class="py-3 px-4 !text-center">ID</th>
                        <th class="py-3 px-4 !text-center">Tên</th>
                        <th class="py-3 px-4 !text-center">Email</th>
                        <th class="py-3 px-4 !text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="even:bg-gray-200 odd:bg-gray-50 hover:bg-teal-200 border-t border-gray-200">
                            <td class="py-3 px-4 !text-center">{{ $user->id }}</td>
                            <td class="py-3 px-4 text-center">{{ $user->name }}</td>
                            <td class="py-3 px-4 text-center">{{ $user->email }}</td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('admin.users.edit', $user->id) }}">
                                    <i class="fa-solid fa-pen-to-square text-yellow-400 text-xl mr-2"></i>
                                </a>
                                <button type="button" class="delete_user" onclick="">
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
@vite(['resources/js/pages/users.js'])