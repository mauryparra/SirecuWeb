<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();

        $admin_user = new User();
        $admin_user->name = 'Administrador';
        $admin_user->email = 'admin@admin.com';
        $admin_user->password = bcrypt('admin');
        $admin_user->save();
        $admin_user->roles()->attach($role_admin);
    }
}
