<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guard_name =  config('auth.defaults.guard');

        Permission::insert([
            [
                'name' => 'view-any permissions',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'view permissions',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'create permissions',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'update permissions',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'delete permissions',
                'guard_name' => $guard_name,
            ],
        ]);

        Permission::insert([
            [
                'name' => 'view-any roles',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'view roles',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'create roles',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'update roles',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'delete roles',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'sync-permissions roles',
                'guard_name' => $guard_name,
            ],
        ]);

        Permission::insert([
            [
                'name' => 'view-any users',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'view users',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'create users',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'update users',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'revoke users',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'restore users',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'delete users',
                'guard_name' => $guard_name,
            ],
        ]);

        Permission::insert([
            [
                'name' => 'view-any applications',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'view applications',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'accept applications',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'approve applications',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'create applications',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'confirm applications',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'update applications',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'delete applications',
                'guard_name' => $guard_name,
            ],
        ]);

        Permission::insert([
            [
                'name' => 'view-any leaves',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'view leaves',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'apply leaves',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'create leaves',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'update leaves',
                'guard_name' => $guard_name,
            ],
            [
                'name' => 'delete leaves',
                'guard_name' => $guard_name,
            ],
        ]);

       Permission::insert([
           [
               'name' => 'view-any leave_types',
               'guard_name' => $guard_name,
           ],
           [
               'name' => 'view leave_types',
               'guard_name' => $guard_name,
           ],
           [
               'name' => 'create leave_types',
               'guard_name' => $guard_name,
           ],
           [
               'name' => 'update leave_types',
               'guard_name' => $guard_name,
           ],
           [
               'name' => 'delete leave_types',
               'guard_name' => $guard_name,
           ],
           [
               'name' => 'sync-hops leave_types',
               'guard_name' => $guard_name,
           ],
       ]);
//
//        Permission::insert([
//            [
//                'name' => 'view-any hops',
//                'guard_name' => $guard_name,
//            ],
//            [
//                'name' => 'view hops',
//                'guard_name' => $guard_name,
//            ],
//            [
//                'name' => 'create hops',
//                'guard_name' => $guard_name,
//            ],
//            [
//                'name' => 'update hops',
//                'guard_name' => $guard_name,
//            ],
//            [
//                'name' => 'delete hops',
//                'guard_name' => $guard_name,
//            ],
//        ]);
//
//        Permission::insert([
//            [
//                'name' => 'view-any bus-types',
//                'guard_name' => $guard_name,
//            ],
//            [
//                'name' => 'view bus-types',
//                'guard_name' => $guard_name,
//            ],
//            [
//                'name' => 'create bus-types',
//                'guard_name' => $guard_name,
//            ],
//            [
//                'name' => 'update bus-types',
//                'guard_name' => $guard_name,
//            ],
//            [
//                'name' => 'delete bus-types',
//                'guard_name' => $guard_name,
//            ],
//            [
//                'name' => 'sync-seats bus-types',
//                'guard_name' => $guard_name,
//            ],
//        ]);
    }
}
