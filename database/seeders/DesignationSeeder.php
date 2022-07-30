<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $designations = [
            1  => [
                'designation' => 'University President',
                'access'      => 'university',
            ],
            2  => [
                'designation' => 'Vice President for Academic Affairs',
                'access'      => 'university',
            ],
            3  => [
                'designation' => 'Vice President for Development and External Affairs',
                'access'      => 'university',
            ],
            4 => [
                'designation' => 'Chancellor',
                'access'      => 'campus',
            ],
            5 => [
                'designation' => 'Campus Director',
                'access'      => 'campus',
            ],
            6 => [
                'designation' => 'Vice Chancellor for Academic Affairs',
                'access'      => 'campus',
            ],
            7 => [
                'designation' => 'Vice Chancellor for Development and External Affairs',
                'access'      => 'campus',
            ],
            8 => [
                'designation' => 'Head, Extension Services Office',
                'access'      => 'campus',
            ],
            9 => [
                'designation' => 'College Dean',
                'access'      => 'college',
            ],
            10 => [
                'designation' => 'Program Chairperson',
                'access'      => 'program',
            ],
        ];

        foreach ($designations as $key => $designation) {
            Designation::factory()->create($designation);
        }
    }
}
