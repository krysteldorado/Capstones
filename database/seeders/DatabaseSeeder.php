<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UniversitySeeder::class,
            CampusSeeder::class,
            DesignationSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            EmployerSeeder::class,
        ]);
    }
}
