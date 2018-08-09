<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'kultura',
        ]);
        DB::table('categories')->insert([
            'name' => 'zabava',
        ]);
        DB::table('categories')->insert([
            'name' => 'muzika',
        ]);
        DB::table('categories')->insert([
            'name' => 'sport',
        ]);
        DB::table('categories')->insert([
            'name' => 'novosti',
        ]);
    }
}
