<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$this->call(RoleSeeder::class);
		$this->call(CategorySeeder::class);
		$this->call(AdminsSeeder::class);
		factory(App\User::class, 30)->create();
		factory(App\Post::class, 30)->create();
		$this->call(SlugSeeder::class);
		$this->call(RoleUserSeeder::class);

	}
}
