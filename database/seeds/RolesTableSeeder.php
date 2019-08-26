<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role_admin = new Role();
        $role_admin->name = "Administrador";
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = "Usuario";
        $role_user->save();

    }
}
