<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('series')->insert([
          'name' => "India tour pakistan",
      ]);
    }
}
