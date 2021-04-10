<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $names = ['Home', 'Register', 'Login', 'Dashboard', 'Users', 'Blogs'];
    private $urls = ['home',  'register.create', 'login.create', 'admin', 'users.index', 'blogs-manage.index'];
    private $role = [null, null, null, 1, 1, 1];


    public function run()
    {
        for ($i = 0, $iMax = count($this->names); $i < $iMax; $i++){
            DB::table('menus')->insert([
                'name' => $this->names[$i],
                'url' => $this->urls[$i],
                'role_id'=>$this->role[$i]
            ]);

        }
    }
}
