<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('permissions.index', compact('users', 'roles', 'permissions'));
    }

    public function update(Request $request)
    {
        // Xác định các quyền và vai trò từ form
        $roles = $request->input('roles', []);
        $permissions = $request->input('permissions', []);
        
        // Cập nhật quyền và vai trò cho từng người dùng
        foreach ($roles as $userId => $userRoles) {
            $user = User::findOrFail($userId);  // Sử dụng findOrFail
            // Gán lại các vai trò
            $user->syncRoles($userRoles);
        }

        foreach ($permissions as $userId => $userPermissions) {
            $user = User::findOrFail($userId);  // Sử dụng findOrFail
            // Gán lại các quyền
            $user->syncPermissions($userPermissions);
        }

        return redirect()->route('permissions.index')->with('success', 'Quyền người dùng đã được cập nhật thành công.');
    }
}
