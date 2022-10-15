<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);

        $role2  = Role::create(['name'=>'Usuario']);


        Permission::create(['name'=>'admin'])->syncRoles([$role1]);

        
        Permission::create(['name'=>'lugars.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'lugars.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'lugars.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'lugars.show'])->syncRoles([$role1]);
        Permission::create(['name'=>'lugars.destroy'])->syncRoles([$role1]);
      


    }
}
