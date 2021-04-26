<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;



use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Role1 = Role::create(['name'=>'Administrador']);
        $Role2 = Role::create(['name'=>'Usuario']);

        Permission::create(['name' => 'register'])->assignRole($Role1);

    }
}
