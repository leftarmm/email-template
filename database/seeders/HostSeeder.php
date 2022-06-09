<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hosts = array(
            ['url' => "smtp.office365.com", 'name' => "O365", "port" => 587],
            ['url' => "smtp.gmail.com", 'name' => "Gmail", "port" => 587]
        );

        foreach ($hosts as $key => $value) {
            DB::table('hosts')->insert([
                'name' => $value['name'],
                'url' => $value['url'],
                'port' => $value['port']
            ]);
        }
    }
}
