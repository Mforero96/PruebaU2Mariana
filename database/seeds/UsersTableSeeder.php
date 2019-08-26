<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Administrador')->first();

        $admin = new User();
        $admin->name = "Mariana";
        $admin->username = "mforero";
        $admin->email = "maforero@gmail.com";
        $admin->password = bcrypt('Mariana');
        $admin->city = 107;//Bogotá
        $admin->role = $role_admin->id;

        $admin->save();

    }
}
