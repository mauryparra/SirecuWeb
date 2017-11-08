<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'Usuario Administrador';
        $role_admin->save();
        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'Usuario Normal';
        $role_user->save();
    }
}
