<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // ROLE
        $roleAdmin = Role::updateOrCreate(
            ['name' => 'admin'],
            ['name' => 'admin']
        );
        $rolePetugas = Role::updateOrCreate(
            ['name' => 'petugas'],
            ['name' => 'petugas']
        );
        $rolePelanggan = Role::updateOrCreate(
            ['name' => 'pelanggan'],
            ['name' => 'pelanggan']
        );

        // PERMISSION
        $permission = Permission::updateOrCreate(
            ['name' => 'data_petugas'],
            ['name' => 'data_petugas']
        );

        $permission2 = Permission::updateOrCreate(
            ['name' => 'data_kendaraan'],
            ['name' => 'data_kendaraan']
        );

        $permission3 = Permission::updateOrCreate(
            ['name' => 'data_pengiriman'],
            ['name' => 'data_pengiriman']
        );

        // ADMIN
        $roleAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission2);
        $roleAdmin->givePermissionTo($permission3);

        // PETUGAS
        $rolePetugas->givePermissionTo($permission3);

        $admin = User::find(1);
        $petugas = User::find(2);

        $admin->assignRole('admin');
        $petugas->assignRole('petugas');
    }
}