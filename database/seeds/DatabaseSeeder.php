<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        Role::create(['name' => 'Модератор']);
    }
}

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $moderator = User::create(['name' => 'Святослав', 'surname' => 'Солопченко', 'email' => 'hi@solopchenko.net', 'password' => bcrypt('password')]);
        $moderator_role = Role::where('name', 'Модератор')->first();
        $moderator->roles()->attach($moderator_role->id);
    }
}
