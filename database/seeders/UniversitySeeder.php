<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            'มหาวิทยาลัยเชียงใหม่',
            'มหาวิทยาลัยแม่โจ้',
            'มหาวิทยาลัยพะเยา',
            'มหาวิทยาลัยกาฬสินธุ์',
            'มหาวิทยาลัยราชภัฏกำแพงเพชร'
        );

        foreach ($array as $key => $value) {
            DB::table('universities')->insert([
                'name' => $value,
            ]);
        }
    }
}
