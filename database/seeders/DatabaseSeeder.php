<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'lannacom';
        $admin->email = 'admin@lanna.co.th';
        $admin->email_verified_at = now();
        $admin->password = bcrypt('Lannacom@1');
        $admin->remember_token = Str::random(10);
        $admin->save();
        \App\Models\User::factory(10)->create();

        $this->call([
            AdminSeeder::class,
            HostSeeder::class,
            TemplateSeeder::class,
        ]);
    }
}
