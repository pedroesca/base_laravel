<?php


use Illuminate\Database\Seeder;
use App\Model\Roles;
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

        $role_admin = Roles::where('nombre', 'admin')->first();

        $user = new User();
        $user->name = 'Admin';
        $user->username = 'admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->activation_token = '';
        $user->active = true;
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
