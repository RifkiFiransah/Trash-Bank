<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions for admin guard
        $permissions = [
            'view_any_penarikan',
            'view_penarikan',
            'create_penarikan',
            'update_penarikan',
            'delete_penarikan',
            'delete_any_penarikan',
            'force_delete_penarikan',
            'force_delete_any_penarikan',
            'restore_penarikan',
            'restore_any_penarikan',
            'replicate_penarikan',
            'reorder_penarikan',
            'view_any_penjualan',
            'view_penjualan',
            'create_penjualan',
            'update_penjualan',
            'delete_penjualan',
            'delete_any_penjualan',
            'force_delete_penjualan',
            'force_delete_any_penjualan',
            'restore_penjualan',
            'restore_any_penjualan',
            'replicate_penjualan',
            'reorder_penjualan',
            'view_any_role',
            'view_role',
            'create_role',
            'update_role',
            'delete_role',
            'delete_any_role',
            'view_any_sampah',
            'view_sampah',
            'create_sampah',
            'update_sampah',
            'delete_sampah',
            'delete_any_sampah',
            'force_delete_sampah',
            'force_delete_any_sampah',
            'restore_sampah',
            'restore_any_sampah',
            'replicate_sampah',
            'reorder_sampah',
            'view_any_setoran',
            'view_setoran',
            'create_setoran',
            'update_setoran',
            'delete_setoran',
            'delete_any_setoran',
            'force_delete_setoran',
            'force_delete_any_setoran',
            'restore_setoran',
            'restore_any_setoran',
            'replicate_setoran',
            'reorder_setoran',
            'view_any_user',
            'view_user',
            'create_user',
            'update_user',
            'delete_user',
            'delete_any_user',
            'force_delete_user',
            'force_delete_any_user',
            'restore_user',
            'restore_any_user',
            'replicate_user',
            'reorder_user',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'admin']
            );
        }

        // Create Super Admin role for admin guard
        $superAdminRole = Role::firstOrCreate(
            ['name' => 'super_admin', 'guard_name' => 'admin']
        );

        // Give all permissions to Super Admin
        $superAdminRole->syncPermissions($permissions);

        // Create admin user
        $admin = Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@banksampah.com',
            'password' => Hash::make('password'),
        ]);

        // Assign Super Admin role to admin
        $admin->assignRole($superAdminRole);
    }
}
