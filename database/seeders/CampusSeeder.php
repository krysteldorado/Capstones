<?php

namespace Database\Seeders;

use App\Models\Campus;
use App\Models\College;
use App\Models\Program;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campuses = [
            1 => [
                'campus'     => 'Central Administration',
                'address'  => 'Batangas City, Batangas',
            ],
            2 => [
                'campus'     => 'Pablo Borbon Campus',
                'address'  => 'Batangas City, Batangas',
            ],
            3 => [
                'campus'     => 'Lemery Campus',
                'address'  => 'Lemery, Batangas',
            ],
            4 => [
                'campus'     => 'Rosario Campus',
                'address'  => 'Rosario, Batangas',
            ],
            5 => [
                'campus'     => 'San Juan Campus',
                'address'  => 'San Juan, Batangas',
            ],
            6 => [
                'campus'     => 'Alangilan Campus',
                'address'  => 'Alangilan, Batangas',
            ],
            7 => [
                'campus'     => 'Lobo Campus',
                'address'  => 'Lobo, Batangas',
            ],
            8 => [
                'campus'     => 'Balayan Campus',
                'address'  => 'Balayan, Batangas',
            ],
            9 => [
                'campus'     => 'Mabini Campus',
                'address'  => 'Mabini, Batangas',
            ],
            10 => [
                'campus'     => 'Lipa City Campus',
                'address'  => 'Lipa City, Batangas',
            ],
            11 => [
                'campus'     => 'JPLPC-Malvar Campus',
                'address'  => 'Malvar, Batangas',
            ],
            12 => [
                'campus'     => 'ARASOF-Nasugbu Campus',
                'address'  => 'Nasugbu, Batangas',
            ],
            13 => [
                'campus'     => 'Taysan Campus',
                'address'  => 'Taysan, Batangas',
            ],
        ];

        foreach ($campuses as $key => $campus) {
            $campus = Campus::factory()->create([   
                'campus' => $campus['campus'],
                'address' => $campus['address'],
            ]);

            $colleges = College::factory(rand(2,4))->create(['campus_id'=>$campus->id]);

            foreach ($colleges as $college) {
                Program::factory(rand(2,4))->create(['college_id'=>$college->id]);
            }
        }
    }
}
