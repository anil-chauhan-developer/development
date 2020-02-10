<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => "Backend Developer",
          'email' => "anilchauhan688@gmail.com",
          'password' => bcrypt('Developer@123'),
      ]);
    }
}
