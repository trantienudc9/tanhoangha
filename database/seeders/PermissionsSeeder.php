<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Tạo các quyền cơ bản
        $permissions = ['create', 'edit', 'delete', 'read'];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
