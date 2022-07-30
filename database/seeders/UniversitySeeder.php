<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        University::create([   
            'university' => 'Batangas State University',
            'about' => 'Quality Policy Batangas State University is committed to the continuous improvement of its services to all customer to meet the challenges of a world class educational institution.',
            'logo' => 'university.png',
        ]);
    }
}
