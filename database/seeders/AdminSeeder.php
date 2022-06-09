<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = array(
            ['name' => 'dynatix', 'email' => 'neo@dynatix.co.th',  'password' => "D\/n@t1x#2Otwotwo"],
            ['name' => 'up1', 'email' => 'libarts.lc@up.ac.th',  'password' => "Libarts.lc2021"],
            ['name' => 'up2', 'email' => 'libart.lc@up.ac.th',  'password' => "Uplib@2021"],
            ['name' => 'up3', 'email' => 'libart.lct@up.ac.th',  'password' => "Uplib@2021"],
            ['name' => 'up4', 'email' => 'libarts.lct@up.ac.th',  'password' => "Uplib@2021"],
            ['name' => 'up5', 'email' => 'libarts.lcr@up.ac.th',  'password' => "Uplib@2021"],
            ['name' => 'ksu', 'email' => 'edi@ksu.ac.th',  'password' => "043602037"],
            ['name' => 'kpru', 'email' => 'lc_kpru@kpru.ac.th',  'password' => "lckpru2021"],
        );

        foreach ($admins as $key => $value) {
            DB::table('admins')->insert([
                'name' => $value['name'],
                'email' => $value['email'],
                'password' => encrypt($value['password'])
            ]);
        }
    }
}
