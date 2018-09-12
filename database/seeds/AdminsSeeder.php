<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('111admin'), 
            'is_admin'=>User::IS_ADMIN,
            'status'=>User::IS_ACTIVE,
            'remember_token' => str_random(10),
            'created_at' =>'2018-08-27 00:15:31',
            'updated_at' =>'2018-08-27 00:15:31'

        ]);
    }
}
