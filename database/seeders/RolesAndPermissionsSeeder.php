<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Xóa bỏ cache quyền trước khi thiết lập
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // Tạo các quyền
         $permissions = [
             'create posts',
             'edit posts',
             'delete posts',
             'publish posts',
             'unpublish posts',
         ];

         foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
         }

         // Tạo vai trò và gán quyền cho vai trò
         $adminRole = Role::create(['name' => 'admin']);
         $editorRole = Role::create(['name' => 'editor']);
         $userRole = Role::create(['name' => 'user']);

         // Gán quyền cho các vai trò
         $adminRole->givePermissionTo(Permission::all());
         $editorRole->givePermissionTo(['create posts', 'edit posts', 'publish posts', 'unpublish posts']);
         $userRole->givePermissionTo(['create posts']);

         // Gán vai trò cho người dùng
         // Tìm người dùng và gán vai trò
         $user = User::find(1); // Giả sử người dùng có ID là 1
         if ($user) {
             $user->assignRole('admin');
         }

    }
}
