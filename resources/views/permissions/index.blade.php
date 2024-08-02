<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-semibold mb-4">Quản lý Quyền Người Dùng</h1>
    
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
    
        <form action="{{ route('permissions.update') }}" method="POST">
            @csrf
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Tên Người Dùng</th>
                            @foreach($roles as $role)
                                <th class="py-2 px-4 border-b">{{ $role->name }}</th>
                            @endforeach
                            @foreach($permissions as $permission)
                                <th class="py-2 px-4 border-b">{{ $permission->name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                                @foreach($roles as $role)
                                    <td class="py-2 px-4 border-b text-center">
                                        <input type="checkbox" name="roles[{{ $user->id }}][]" value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                    </td>
                                @endforeach
                                @foreach($permissions as $permission)
                                    <td class="py-2 px-4 border-b text-center">
                                        <input type="checkbox" name="permissions[{{ $user->id }}][]" value="{{ $permission->name }}" {{ $user->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cập nhật Quyền</button>
            </div>
        </form>
    </div>
</x-app-layout>