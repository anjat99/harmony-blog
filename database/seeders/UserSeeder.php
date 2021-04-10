<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([
                'firstname' => 'Anja',
                'lastname' => 'Tomić',
                'email' => 'anja.tomic099@gmail.com',
                'password' => md5('admin4Blog'),
                'role_id' => 1
            ]);
    }
}
