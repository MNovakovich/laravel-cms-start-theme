<?php

use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            'option_name'  => 'blogname',
            'option_value' => 'Novosti',
            'autoload'     => 'yes'

        ]);

           DB::table('options')->insert([
            'option_name'  => 'blogdescription',
            'option_value' => 'Prva kopija wordpressa u laravelu',
            'autoload'     => 'yes'

        ]);
    }
}
