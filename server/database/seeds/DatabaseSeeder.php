<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $password = md5(hash('sha512', 'admin').hash('ripemd160', 'admin').md5("strongest"));
        DB::table('users')->insert([
            'username' => 'superadmin',
            'password' => $password,
            'role' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $password = md5(hash('sha512', 'admin').hash('ripemd160', 'admin').md5("strongest"));
        DB::table('users')->insert([
            'username' => 'user1',
            'password' => $password,
            'role' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $password = md5(hash('sha512', 'admin').hash('ripemd160', 'admin').md5("strongest"));
        DB::table('users')->insert([
            'username' => 'user2',
            'password' => $password,
            'role' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
