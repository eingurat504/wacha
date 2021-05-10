<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        $user = new User();
        $user->name = ' Super Admin';
        $user->email = 'superadmin@admin.com';
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->password = Hash::make('12345678');
        $user->save();

        $role = Role::firstOrFail();
        $user->roles()->sync([$role->id]);
        $user->save();
    }

}
