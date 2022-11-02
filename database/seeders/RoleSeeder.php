<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::Create(['name'=>'admin']);
        $role2 = Role::Create(['name'=>'inventario']);
        $role3 = Role::Create(['name'=>'bodega']);
        $role4 = Role::Create(['name'=>'tecnico']);

        Permission::create(['name' => 'admin'])->assignRole($role1);
        Permission::create(['name' => 'inventario'])->assignRole($role2);
        Permission::create(['name' => 'bodega'])->assignRole($role3);
        Permission::create(['name' => 'tecnico'])->assignRole($role4);
        Permission::create(['name' => 'tecniadmin'])->assignRole($role1,$role4);
        Permission::create(['name' => 'tecniBodeAdminInve'])->assignRole($role1,$role2,$role3,$role4);
        Permission::create(['name' => 'invenBode'])->assignRole($role2,$role3);
        Permission::create(['name' => 'bodeAdmin'])->assignRole($role3,$role1);


    }
}
