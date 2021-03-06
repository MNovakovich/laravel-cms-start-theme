<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->count();
        $num = $users;
        DB::table('role_user')->insert([
            'user_id' =>Role::find(1)->id,
            'role_id' => 1,
        ]);
        for($i = 0; $i < $num; $i ++){
            DB::table('role_user')->insert([
                'user_id' =>User::all()->random()->id,
                'role_id' => Role::all()->random()->id,
            ]);

        }
    }
}
