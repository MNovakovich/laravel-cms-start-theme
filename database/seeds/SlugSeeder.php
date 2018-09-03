<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::update('update posts set slug = title');

         /*
           UPDATE posts
               SET slug = REPLACE(slug, ' ', '-')


          UPDATE posts SET slug = LOWER(slug)

          */
        // DB::update('UPDATE posts SET slug REPLACE(slug, " ", "-")');
    }
}
