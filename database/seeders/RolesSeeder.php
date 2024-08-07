<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Tạo roles nếu chưa tồn tại
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Gán tất cả quyền cho role admin
        $adminRole->givePermissionTo(Permission::all());

        // Gán quyền cụ thể cho role user
        $userRole->givePermissionTo(['create', 'edit', 'read']);
    }
}
