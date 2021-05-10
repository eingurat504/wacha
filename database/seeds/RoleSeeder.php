<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role();
        $role->name = 'Super Admin';
        $role->save();

        $permission_ids = range(1, Permission::count());
        $role->permissions()->sync($permission_ids, true);
    }
}
