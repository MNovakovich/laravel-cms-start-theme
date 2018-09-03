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
            'name' => 'Uncategorized',
        ]);
        DB::table('categories')->insert([
            'name' => 'Zabava',
        ]);
        DB::table('categories')->insert([
            'name' => 'Kultura',
        ]);
        DB::table('categories')->insert([
            'name' => 'Muzika',
        ]);
        DB::table('categories')->insert([
            'name' => 'Sport',
        ]);
        DB::table('categories')->insert([
            'name' => 'Novosti  ',
        ]);
    }
}
