<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert(
            [
                [
                    'name' => 'Hoai Nam',
                    'email' => "hoainam@gmail.com",
                    'password' => Hash::make('123'),
                    'avatar' => null,
                    'level' => 0,
                    'description' => null,

                ],
                [
                    'name' => 'Hao',
                    'email' => "nhathao@gmail.com",
                    'password' => Hash::make('123'),
                    'avatar' => null,
                    'level' => 0,
                    'description' => null,
                ],
            ]
        );
    }
}
